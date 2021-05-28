<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductsImage;
use App\Helpers\Helper;
use App\Models\Size;
use App\Models\Color;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::where('status','Active')->get();
        $colors = Color::where('status','Active')->get();
        $data = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.products.index',compact('data','sizes','colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $firstcategory = Category::whereNull('parent_id')->first();
        $subcategory_id = Category::wherenotNull('parent_id')->get();
        $sizes = Size::where('status','Active')->get();
        $colors = Color::where('status','Active')->get();
        $categories = Category::whereNull('parent_id')->where('status','Active')->get();
        if (isset($request->category_id) && $request->category_id !='') {
            $subcategories = Category::wherenotNull('parent_id')->where('parent_id',$request->category_id)->get();
        }
        else{ 
            $subcategories = Category::wherenotNull('parent_id')->where('parent_id',@$firstcategory->id)->get();
        }
        return view('admin.products.create',compact('categories','sizes','colors','subcategories','subcategory_id','firstcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'parent_category_id' => 'required',
            'subcategory_id' => 'required',
            'productname' => 'required',
            'mrp_price' => 'required',
            'selling_price' => 'required',
            'productstatus' => 'required',
        ]);

        $slug = Helper::getBlogUrl($request->productname);
        if (Product::where('slug', '=', $slug)->count() > 0)
        {
            return back()->with('flash_error', 'Product Already Exits');
        }
        else
        {
            if(!empty($request->groups)){
                $get_groups = implode(',',$request->groups); 
            }else{
                $get_groups = '';
            }
            
            $product = new Product;
            $product->category_id = $request->parent_category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->name = $request->productname;
            $product->groups = $get_groups;
            $product->weight = $request->weight;
            $product->weight_units = $request->unit_id;
            $product->stock_count = $request->stock_count;

            $product->description = $request->description;
            $product->additional_information = $request->additional_information;
            $product->shipping_returns = $request->shipping_returns;

            $product->mrp_price = $request->mrp_price;
            $product->selling_price = $request->selling_price;
            $product->status = $request->productstatus;
            $product->slug = $slug;
            $product->save();

            if($request->hasfile('images'))
            {
                $imgCount = 0;
                foreach($request->file('images') as $image)
                {
                    $imgCount++;
                    $name=time().uniqid(). '.' . $image->getClientOriginalName();
                    $image->move(public_path().'/assets/images/products/', $name);  
                    $data[] = $name;

                    $product_images= new ProductsImage();
                    $product_images->products_id = $product->id;
                    $product_images->image = $name;
                    if ($imgCount == 1) {
                        $product_images->is_featured = 1;
                    }
                    else{
                        $product_images->is_featured = 0;
                    }
                    $product_images->save();  
                }
            } 
            return back()->with('flash_success', 'Product Created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addMoreImages(Request $request)
    {
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name=time().uniqid(). '.' . $image->getClientOriginalName();
                $image->move(public_path().'/assets/images/products/', $name);  
                $data[] = $name;

                $product_images= new ProductsImage();
                $product_images->products_id = $request->product_id;
                $product_images->image = $name;
                $product_images->is_featured = 0;
                $product_images->save();  
            }
        } 
        return back()->with('flash_success', 'Images Uploaded successfully');
    }


    public function edit(Request $request,$id)
    {
        $sizes = Size::where('status','Active')->get();
        $colors = Color::where('status','Active')->get();
        $images = ProductsImage::where('products_id',$id)->get();
        $data = Product::findOrFail($id);
        @$size_id = explode(',', $data->size_id);
        @$color_id = explode(',', $data->color_id);
        $categories = Category::whereNull('parent_id')->get();
        $firstcategory = Category::whereNull('parent_id')->first();
        if (isset($request->category_id) && $request->category_id !='') {
            $subcategories = Category::wherenotNull('parent_id')->where('parent_id',$request->category_id)->get();
        }
        else{
            $subcategories = Category::wherenotNull('parent_id')->where('parent_id',$data->category_id)->get();
        }
        return view('admin.products.edit',compact('data','categories','images','sizes','colors','size_id','color_id','subcategories','firstcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subcategory_id' => 'required',
            'parent_category_id' => 'required',
            'productname' => 'required',
            'mrp_price' => 'required',
            'selling_price' => 'required',
            'productstatus' => 'required',
        ]);

        if(!empty($request->groups)){
            $get_groups = implode(',',$request->groups); 
        }else{
            $get_groups = '';
        }
        
        $product = Product::find($id);
        $product->category_id = $request->parent_category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->name = $request->productname;
        $product->weight = $request->weight;
        $product->weight_units = $request->unit_id;
        $product->groups = $get_groups;
        $product->stock_count = $request->stock_count;
        $product->description = $request->description;
        $product->additional_information = $request->additional_information;
        $product->shipping_returns = $request->shipping_returns;
        $product->mrp_price = $request->mrp_price;
        $product->selling_price = $request->selling_price;
        $product->status = $request->productstatus;
        $product->save();

        return back()->with('flash_success', 'Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $product_images = ProductsImage::where('products_id',$id)->get();
        foreach ($product_images as $product_image) {
            @unlink(public_path('/assets/images/products/'.$product_image->image));
            $product_image->delete();
        }
        $data->delete();
        return back()->with('flash_success', 'Product Deleted  Successfully!');
    }

    public function makeFeatureImage(Request $request)
    {
        $arr['succ'] = 0;
        $id = $request->id;
        $imageId = $request->imageId;

        ProductsImage::where('products_id', $id)->update([
            'is_featured' => 0
        ]);

        $data = ProductsImage::where('products_id',$id)->where('id',$imageId)->first();
        $data->is_featured = 1;
        if ($data->save()) {
            $arr['id'] = $id;
            $arr['succ'] = 1;
        }
        echo json_encode($arr); 

    }

    public function deleteMultipleImages(Request $request)
    {
        $id = $_REQUEST['id'];
        $data = ProductsImage::find($id);
        $delete = @unlink(public_path('/assets/images/products/'.$data->image));
        if ($delete = true) {
            if ($data->delete()) {
                return back()->with('flash_success', 'Image Deleted Successfully!');
            }
        }
    }
}
