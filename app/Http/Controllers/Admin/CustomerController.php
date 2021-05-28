<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    public function index()
    {
    	$data = User::where('role_id',2)->paginate(10);
    	return view('admin.customers.index',compact('data'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.customers.show',compact('user'));
    }
}
