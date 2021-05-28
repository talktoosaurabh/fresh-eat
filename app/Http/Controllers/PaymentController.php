<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;
use Carbon\Carbon;
use Twilio\Rest\Client;
use Mail;
use App\Mail\OrderMail;
use Session;
use App\Models\Cart;
use App\Models\OrderList;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Pincode;
use App\Models\Product;
use DB;

class PaymentController extends Controller
{
    public function thankyou(Request $request)
    {
      $title = "Thank You | Fresh Eat";
      $desc = "Thank You | Fresh Eat";
    	return view('thankyou',compact('title','desc'));
    }

    public function order_success(Request $request)
    {
      
      $get_orders_list = OrderList::where('order_id',$request->order_id)->get();
      foreach ($get_orders_list as $key => $list) {
        $get_product = Product::where('id',$list->product_id)->first();
        $product_stock = $get_product->stock_count - $list->quantity;
        $update_stock = Product::where('id',$list->product_id)->update(['stock_count' => $product_stock]);
      }
      $update_order = Order::where('id',$request->order_id)->update(['payment_status' => 'paid','status' => 'received','payment_id' => $request->razorpay_payment_id]);
      $get_order = Order::where('id',$request->order_id)->first();
      $admin_email = env('ADMIN_EMAIL');
      try {
          $data = ['order_id' => $request->order_id];
          Mail::to($get_order->email)->send(new OrderMail($data));
          Mail::to($admin_email)->send(new OrderMail($data));
      } catch (Exception $e) {
      }
      $data = ['msg'=>'Updated successfully'];
      return response()->json($data);
    }

    public function get_order_details($order_id){

      $title = 'Checkout | Fresh Eat';
      $desc = 'Checkout | Fresh Eat';
      $get_order = Order::where('order_id',$order_id)->first();
      if(!empty($get_order->coupon_id)){
        $get_coupon = Coupon::where('id',$get_order->coupon_id)->first();
        if($get_coupon->discount_type == 'Percentage'){
          $get_order->display_text = '('.$get_coupon->discount_amount.' %)';
        }else{
          $get_order->display_text = '('.format_money($get_coupon->discount_amount).')';
        }
      }else{
        $get_order->display_text = '';
      }
      $orders_list = OrderList::where('order_id',$get_order->id)->get();
      $subtotal = 0;
      foreach ($orders_list as $p => $orders) {
        $orders_list[$p]->product_name = $orders->get_product()->name;
        $orders_list[$p]->product_slug = $orders->get_product()->slug;
      }
      return view('checkout',compact('title','desc','orders_list','get_order'));
    }


    public function placeOrder(Request $request)
    {
      if(Auth::check()){
        $this->validate($request, [
          'shipping' => 'required',
          'name' => 'required',
          'email' => 'required',
          'country' => 'required',
          'address' => 'required',
          'state' => 'required',
          'phone' => 'required',
          'town' => 'required',
          'pincode' => 'required'
        ]);
      }else{
        $this->validate($request, [
          'shipping' => 'required',
          'name' => 'required',
          'email' => 'required',
          'country' => 'required',
          'address' => 'required',
          'state' => 'required',
          'phone' => 'required',
          'town' => 'required',
          'pincode' => 'required',
          'password' => 'required'
        ]);
      }
      if(!Auth::check()){
        $session_id = Session::getId();
        $carts = Cart::where('session_id',$session_id)->get();
      }else{
        $carts = Cart::where('user_id',Auth::id())->get();
      }
      foreach ($carts as $cart) {
        $cart->delete();
      }

      if(!Auth::check()){
        $get_user = User::where('email',$request->email)->orwhere('phone',$request->phone)->first();
        if(!empty($get_user)){
          $user = User::find($get_user->id);
        }else{
          $user = new User;
        }
       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->town;
        $user->pincode = $request->pincode;
        $user->street = $request->address;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->save();
        $credentials = [
          'email' => $request->email,
          'password' => $request->password,
        ];
        Auth::attempt($credentials);
      }

      if($request->payment_type == 'cod'){
        $get_orders_list = OrderList::where('order_id',$request->order_id)->get();
        foreach ($get_orders_list as $key => $list) {
          $get_product = Product::where('id',$list->product_id)->first();
          $product_stock = $get_product->stock_count - $list->quantity;
          $update_stock = Product::where('id',$list->product_id)->update(['stock_count' => $product_stock]);
        }
      }

      $order = Order::find($request->order_id);
      $order_totals = $order->payable_price + $request->shipping;
      $order->payment_type = $request->payment_type;
      $order->name = $request->name;
      $order->email = $request->email;
      $order->user_id = Auth::id();
      $order->phone = $request->phone;
      $order->delivery_charge = $request->shipping;
      $order->country = $request->country;
      $order->state = $request->state;
      $order->city = $request->town;
      $order->pincode = $request->pincode;
      $order->street = $request->address;
      $order->payable_price = $order_totals;
      $order->order_note = $request->order_note;
      $order->phone = $request->phone;
      $order->payment_status = 'pending';
      $order->status = 'received';
      $order->save();

      $arr = array('msg' => 'Payment successful.', 'status' => true);

      if($request->payment_type == 'online'){
        return view('includes.new-user-checkout',compact('order'));
      }else{
        try {
            $data = ['order_id' => $order->id];
            Mail::to($request->email)->send(new OrderMail($data));
            Mail::to(env('ADMIN_EMAIL'))->send(new OrderMail($data));
        } catch (Exception $e) {
        }
        return view('thankyou');
      }
      
 
    }

    public function cancel_order($order_id){
     
        $order = Order::where('id',$order_id)->first();
       
        if ($order) {
            $order->status = 'cancelled';
            $order->cancelled_by = 'customer';
            $order->save();
            //sms call

            try {
              
                $data = ['order_id' => $order->id,'cancel' => 'customer'];
                Mail::to($order->email)->send(new OrderMail($data));
                Mail::to(env('ADMIN_EMAIL'))->send(new OrderMail($data));
            } catch (Exception $e) {
            }
            
            return back()->with('flash_success', 'Status updated successfully');
        }
    }


    public function oldPlaceOrder(Request $request)
    {

      $user = User::find(Auth::user()->id);
      $getlastId = Order::orderBy('id', 'desc')->first();
      $session_id = Session::getId();
      $carts = Cart::where('session_id',$session_id)->get();
      $getCart = Cart::where('session_id',$session_id)->first();
      $pincode = Pincode::find($getCart->pincode_id);
      if ($getlastId) {
        $order_id = "Tera".time().$getlastId->id;
      }
      else{
        $order_id = "Tera".time()."1";
      }
      

      foreach ($carts as $cart) {
        $subtotal[] = $cart->product->selling_price*$cart->quantity;
        $orderList = new OrderList;
        $orderList->order_id = $order_id;
        $orderList->product_id = $cart->product_id;
        $orderList->mrp_price = $cart->product->mrp_price;
        $orderList->selling_price = $cart->product->selling_price;
        $orderList->quantity = $cart->quantity;
        $orderList->size_id = $cart->size_id;
        $orderList->color_id = $cart->color_id;
        $orderList->save();
      }
      $order = new Order;
      $order->order_id = $order_id;
      $order->user_id = $user->id;
      $order->payment_id = $request->razorpay_payment_id;
      $order->order_price = array_sum($subtotal);
      $order->payable_price = array_sum($subtotal) - \App\Http\Controllers\CartController::getCouponDiscount(@array_sum($subtotal)) + $pincode->delivery_charge;
      $order->status = "received";
      $order->payment_type = "online";
      $order->coupon_id = $getCart->coupon_id;
      $order->coupon_amount = \App\Http\Controllers\CartController::getCouponDiscount(array_sum($subtotal));
      $order->delivery_charge = $pincode->delivery_charge;
      $order->name = $request->shipping_name;
      $order->email = $request->shipping_email;
      $order->phone = $request->shipping_phone;
      $order->country = $request->shipping_country;
      $order->state = $request->shipping_state;
      $order->city = $request->shipping_city;
      $order->pincode = $request->shipping_pincode;
      $order->street = $request->shipping_address;
      $order->order_note = $request->shipping_order_note;
      $order->save();

      Auth::login($user);
      $arr = array('msg' => 'Payment successful.', 'status' => true);
      // try {
      //     $data = ['order_id' => $order->order_id];
      //     Mail::to($user->email)->send(new OrderMail($data));
      // } catch (Exception $e) {
      // }
      foreach ($carts as $cart) {
        $cart->delete();
      }
      return Response()->json($arr); 
    }

    public function applyCoupon(Request $request)
    {
        
        $this->validate($request, [
            'couponcode' => 'required|string',
        ]);
        $get_order = Order::where('id',$request->order_id)->whereNull('coupon_id')->first();
        if(empty($get_order)){
          return back()->with('flash_error','Coupon cannot be applied twice for this order');
        }
        $couponcode = Coupon::where('coupon_code',$request->couponcode)
        ->where('validity_till','>=',date("Y-m-d"))
        ->where('minimum_order','<=',$get_order->order_price)
        ->where('status','Active')
        ->first();
        
        if(!empty($couponcode)){
          $order_info = Order::where('id',$request->order_id)->first();
          if($couponcode->discount_type == 'Percentage'){
            $get_discount = $order_info->payable_price / 100 * $couponcode->discount_amount;
          }else{
            $get_discount = $couponcode->discount_amount;
          }
          $order_price = $order_info->payable_price - $get_discount;
          $update_order = Order::where('id',$request->order_id)->update(['payable_price' => $order_price,'coupon_id'=>$couponcode->id,'coupon_amount' => $get_discount]);
          return back()->with('flash_success','Coupon applied successfully');

        }else{
          return back()->with('flash_error','Coupon is invalid or expired');
        }
    }

    public function removeCoupon(Request $request,$session_id)
    {
        Cart::where('session_id',Session::getId())
                ->update(['coupon_id'=>NULL]);
        return back()->with('coupon_removed', 'Coupon Removed');
    }
}
