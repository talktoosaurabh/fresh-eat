<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::orderBy('id','DESC')->paginate(10);
        return view('admin.banners.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
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
            'title' => 'required',
            'image' => 'required',
            'sub_title' => 'required',
            'status' => 'required',
        ]);

        $banner = new Banner;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('assets/images/banners/'),$filename); 
            $banner->image = $filename;  
        }else{
            $banner->image = ''; 
        }
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->todays_price = $request->today_price;
        $banner->link_title = $request->link_title;
        $banner->link_url = $request->link_url;
        $banner->status = $request->status;
        $banner->save();
        return back()->with('flash_success', 'Banner Created successfully');
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
        $data = Banner::find($id);
        return view('admin.banners.edit',compact('data'));
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
            'status' => 'required',
        ]);

        $banner = Banner::find($id);
        if($request->hasfile('image'))
        {
            if(!empty($banner->image)){
                @unlink('public/assets/images/banners/'.$banner->image);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension($file);
            $file->move(public_path('assets/images/banners'),$filename); 
            $banner->image = $filename;  
        }else{
            $banner->image = $banner->image;
        }
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->todays_price = $request->today_price;
        $banner->link_title = $request->link_title;
        $banner->link_url = $request->link_url;
        $banner->save();
        return back()->with('flash_success', 'Banner Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        @unlink('public/assets/images/banners/'.$banner->image);
        $banner->delete();
        return back()->with('flash_success', 'Banner Deleted  Successfully!');
    }
}
