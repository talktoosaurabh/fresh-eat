<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pincode;
use Excel;
use App\Imports\PincodeImport;

class PincodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pincode::orderBy('id','desc')->get();
        return view('admin.pincodes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pincodes.create');
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
            'delivery_charge' => 'required',
            'pincode' => 'required',
        ]);

        if (Pincode::where('pincode', '=', $request->pincode)->count() > 0)
        {
           return back()->with('flash_error', 'Pincode Exists Can not Create Same Pincode Twice');
        }
        else
        {
            $user = new Pincode();

            $user->delivery_charge = $request->delivery_charge;
            $user->pincode = $request->pincode;
            $user->save();

            return back()->with('flash_success', 'Pincode added successfully');
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
        $data = Pincode::find($id);
        return view('admin.pincodes.edit',compact('data'));
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
        $user = Pincode::find($id);
        $user->delivery_charge = $request->delivery_charge;
        $user->pincode = $request->pincode;
        $user->save();

        return back()->with('flash_success', 'Pincode added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pincode::find($id)->delete();
        return back()->with('flash_success', 'Pincode deleted successfully');
    }

    public function uploadPincode()
    {
        return view('admin.pincodes.upload');
    }

    public function bulkuploadPincode(Request $request)
    {
        Excel::import(new PincodeImport,request()->file('pincode'));
        return back()->with('flash_success', 'Pincode Imported successfully.');
    }
}
