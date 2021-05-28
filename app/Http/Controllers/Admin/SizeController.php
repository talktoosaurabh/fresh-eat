<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Size::orderBy('id','desc')->get();
        return view('admin.sizes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sizes.create');
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
            'status' => 'required',
            'name' => 'required',
        ]);

        if (Size::where('name', '=', $request->name)->count() > 0)
        {
           return back()->with('flash_error', 'Size Exists Can not Create Same Size Twice');
        }
        else
        {
            $user = new Size();

            $user->status = $request->status;
            $user->name = $request->name;
            $user->save();

            return back()->with('flash_success', 'Size added successfully');
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
        $data = Size::find($id);
        return view('admin.sizes.edit',compact('data'));
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
        $user = Size::find($id);
        $user->name = $request->name;
        $user->status = $request->status;
        $user->save();

        return back()->with('flash_success', 'Size Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Size::find($id)->delete();
        return back()->with('flash_success', 'Size deleted successfully');
    }
}
