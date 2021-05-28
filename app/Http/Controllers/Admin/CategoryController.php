<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Helpers\Helper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::whereNull('parent_id')->orderBy('id','DESC')->paginate(10);
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'description' => 'required',
        ]);

        $slug = Helper::getBlogUrl($request->name);
        if (Category::where('slug', '=', $slug)->count() > 0)
        {
            return back()->with('flash_error', 'Category Already Exits');
        }
        else{
            $data = new Category;
            $data->name = $request->name;
            $data->status = $request->status;
            $data->slug = $slug;
            $data->description = $request->description;
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $filename1 = uniqid() . '.' . $file->getClientOriginalExtension($file);
                $file->move(public_path('assets/images/categories/'),$filename1); 
                $data->image = $filename1;  
            }

            $data->save();
            return back()->with('flash_success', 'Category Created successfully');
        }

        
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
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
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
        //dd($_REQUEST);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $slug = Helper::getBlogUrl($request->name);
        $data = Category::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->slug = $slug;
        if($request->hasfile('image'))
        {
            @unlink(public_path('assets/images/categories/'.$data->image));
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('assets/images/categories/'),$filename); 
            $data->image = $filename;  
        }
        $data->save();
        return back()->with('flash_success', 'Category Updated successfully');
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
        return back()->with('flash_success', 'Category Deleted  Successfully!');
    }
}
