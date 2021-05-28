<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use Auth;
use Mail;
use Hash;
use App\Mail\LoginMail;
use App\Mail\PasswordReset;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\OrderList;

class UserController extends Controller
{
     public function __construct()
    {
        //$this->middleware('auth');
    }

    public function myprofile()
    {
        $title = "My Profile | Fresh Eat";
        $desc = "My Profile | Fresh Eat";
        
        $all_orders = Order::where('user_id',Auth::user()->id)->where('status','!=','draft')->orderBy('id','desc')->paginate(3);
        foreach ($all_orders as $m => $orders) {
            $all_orders[$m]->order_list = OrderList::where('order_id',$orders->id)->get();
        }
        $wishlists = Wishlist::where('user_id',Auth::id())->paginate(5);
    	return view('user.myprofile',compact('all_orders','wishlists','title','desc'));
    }

    public function changepassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string',
        ]);
        $checkPassword = User::where('old_password',$request->old_password)
                        ->where('id',Auth::user()->id)->first();
        if ($checkPassword) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->old_password = $request->password;
            return back()->with('flash_success', 'Profile Password Updated');
        }
        else{
            return back()->with('flash_error', 'Old Password is incorrect');
        }
    }

    public function updateprofile(Request $request)
    {
        // echo "<pre>";
        // print_r($_REQUEST);
        // exit();
    	$this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
            'house_no' => 'required|string',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|string',
        ]);

        $user = User::find(Auth::user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->phone = $request->phone;
        $user->save();
        
        $userProfile = UserProfile::where('user_id',Auth::user()->id)->first();
        $userProfile->house_no = $request->house_no;
        $userProfile->address = $request->address;
        $userProfile->country = $request->country;
        $userProfile->state = $request->state;
        $userProfile->city = $request->city;
        $userProfile->pincode = $request->pincode;
        $userProfile->save();
        return back()->with('flash_success', 'Profile Updated');
    }

    public function passwordReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if ($user) {
            $user->password_reset_token = uniqid().uniqid().uniqid().uniqid();
            $user->save();
            $data = ['name' => $user->name,'email' => $user->email,'token' => $user->password_reset_token];
            Mail::to($user->email)->send(new PasswordReset($data));
            return back()->with('flash_success', 'Password Reset Link has been send sucessfully');
        }
        else{
            return back()->with('flash_failure', 'Sorry Email Not found in server');
        }
    }


    public function orderDetails(Request $request)
    {
        $order = Order::where('order_id',$request->order_id)->first();
        if ($order) {
            $orderitems = OrderList::where('order_id',$request->order_id)->get();
            return view('user.order-details',compact('order','orderitems'));
        }
        else{
            abort(404);
        }
    }

    public function updateAccount(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request, [
            "email" => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'name' => 'required',
            'phone' => 'required|unique:users,email,'.$user->id,
        ]);
        
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->pincode = $request->pincode;
        $user->street = $request->street;
        $user->save();
        return back()->with('flash_success', 'Account Updated');
    }

    public function updateAddress(Request $request)
    {
        //dd($_REQUEST);
        $user = User::find(Auth::user()->id);
        // $this->validate($request, [
        //     'name' => 'required',
        //     //'email' => 'required|string|email|unique:users,email,'.$user->email,
        //     //'phone' => 'min:10|max:10|unique:users,phone|required,'.$user->phone,
        //     'country' => 'required',
        //     'state' => 'required',
        //     'city' => 'required',
        //     'pincode' => 'required|min:10|max:10',
        //     'street' => 'required',
        // ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->pincode = $request->pincode;
        $user->street = $request->street;
        $user->save();
        return back()->with('flash_success', 'Account Updated');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        

        if(!Hash::check($request->current_password,$user->password)){
            return back()->with('flash_error', 'Current password is incorrect');
        }

        if ($request->password != $request->confirm_password) {
            return back()->with('flash_error', 'Password and Confirm Password Must be same!');
        }
        else{
            
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('flash_success', 'Password Changed');
        }
    }
}
