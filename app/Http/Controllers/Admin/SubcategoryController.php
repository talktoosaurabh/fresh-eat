<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Helpers\Helper;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::wherenotNull('parent_id')->orderBy('id','DESC')->paginate(10);
        return view('admin.subcategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.subcategory.create',compact('categories'));
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
            'name' => 'required',
            'parent_id' => 'required'
        ]);

        $slug = Helper::getBlogUrl($request->name);
        $data = new Category;
        $data->name = $request->name;
        $data->parent_id = $request->parent_id;
        $data->slug = $slug;
        $data->description = $request->description;
        if($request->hasfile('images'))
        {
            $file = $request->file('images');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('assets/images/categories/'),$filename); 
            $data->image = $filename;  
        }
        $data->save();
        return back()->with('flash_success', 'SubCategory Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $data = Category::find($id);
        return view('admin.subcategory.edit',compact('data','categories'));
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
            'name' => 'required',
        ]);

        $data = Category::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        if($request->hasfile('images'))
        {
            @unlink(public_path('assets/images/categories/'.$data->image));
            $file = $request->file('images');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('assets/images/categories/'),$filename); 
            $data->image = $filename;  
        }
        $data->save();
        return back()->with('flash_success', 'SubCategory Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        @unlink(public_path('assets/images/categories/'.$data->image));
        $data->delete();
        return back()->with('flash_success', 'SubCategory Deleted  Successfully!');
    }
}
