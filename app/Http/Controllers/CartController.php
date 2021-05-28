<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Cart;
use App\Models\Product;
use Auth;
use App\User;
use App\ProductPrice;
use App\Wallet;
use App\Models\Coupon;
use App\Models\Pincode;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\OrderList;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $title = "Cart | Fresh Eat";
        $desc = "Cart | Fresh Eat";
      
        if(!Auth::check()){
            $session_id = Session::getId();
            $carts = Cart::where('session_id',$session_id)->get();
            $isCouponCheck = Cart::where('session_id',$session_id)->wherenotNull('coupon_id')->first();
        }else{
            $carts = Cart::where('user_id',Auth::id())->get();
            $isCouponCheck = Cart::where('user_id',Auth::id())->wherenotNull('coupon_id')->first();
        }
        $subtotal_price = 0;
        $grand_total = 0;
        if(!$carts->isEmpty()){
            foreach ($carts as $c => $item) {
                $get_product = Product::where('id',$item->product_id)->first();
                $subtotal_price += $item->item_price;
            }
            $grand_total = $subtotal_price;
        }


        if ($isCouponCheck) {
            $isCoupon = 1;
            $coupon = Coupon::find($isCouponCheck->coupon_id);
        }
        else{
            $isCoupon = 0;
            $coupon = '';
        }
        return view('cart',compact('carts','isCoupon','coupon','title','desc','grand_total','subtotal_price'));
    }

    public function addToCart(Request $request)
    {
      
        $cart = Cart::where('session_id',Session::getId())
        ->where('product_id',$request->product_id)
        ->first();
        if ($cart) {
            $cart->quantity = $cart->quantity+$request->quantity;
            if($cart->weight_units == 'gm'){
                $into_kg = $get_product->weight / 1000;
                $product_price = $cart->mrp_price / $into_kg;
            }else{
                $product_price = $cart->mrp_price;
            }
            $total_price = $product_price * $cart->quantity;
            $cart->item_price = $total_price;
        }
        else{
            $cart = new Cart;
            $cart->session_id = Session::getId();
            if (!Auth::check()) {
                $cart->user_id = 0;
            }
            else{
                $cart->user_id = Auth::user()->id;
            }
            $get_product = Product::where('id',$request->product_id)->first();
            if($get_product->weight_units == 'gm'){
                $into_kg = $get_product->weight / 1000;
                $product_price = $get_product->mrp_price / $into_kg;
            }else{
                $product_price = $get_product->mrp_price;
            }
            $total_price = $product_price * $request->quantity;

            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->item_price = $total_price;
        }
        $cart->save();
        if($cart->id > 0 || !empty($cart->id)){
            return response()->json(['status'=>1,'msg' => 'Product Added to cart successfully']);
        }else{
            return response()->json(['status'=>0,'msg' => 'Error in adding to cart']);
        }
        
    }

    public function addtoCartWishlist($id)
    {

        if(!Auth::check()){
            $wishlist = Wishlist::where('session_id',Session::getId())->where('id',$id)->first();
        }else{
            $wishlist = Wishlist::where('user_id',Auth::id())->where('id',$id)->first();
        }

        
        if ($wishlist) {
            if(!Auth::check()){
                $cart = Cart::where('session_id',$wishlist->session_id)
                        ->where('product_id',$wishlist->product_id)
                        ->first();
            }else{
                $cart = Cart::where('user_id',Auth::id())
                        ->where('product_id',$wishlist->product_id)
                        ->first();
            }
            
            if ($cart) {
            }
            else{
                $get_product = Product::where('id',$wishlist->product_id)->first();
                if($get_product->weight_units == 'gm'){
                    $into_kg = $get_product->weight / 1000;
                    $product_price = $get_product->mrp_price / $into_kg;
                }else{
                    $product_price = $get_product->mrp_price;
                }
                $total_price = $product_price * 1;
                $cart = new Cart;
                $cart->session_id = Session::getId();
                if (!Auth::check()) {
                    $cart->user_id = 0;
                }
                else{
                    $cart->user_id = Auth::user()->id;
                }
                $cart->quantity = 1;
                $cart->product_id = $wishlist->product_id;
                $cart->item_price = $total_price;
                $cart->save();
            }
            
            $wishlist->delete();
            return back()->with('flash_success', 'Added to Cart');
        }
        else{
            abort(404);
        }
    }

    public function addToWishList(Request $request)
    {
        if (!Auth::check()) {
            $wishlist = Wishlist::where('session_id',Session::getId())
        ->where('product_id',$request->product_id)->first();

        }else{
            $wishlist = Wishlist::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
        }

        if ($wishlist) {
            //$cart->quantity = $cart->quantity+1;
        }
        else{
            $wishlist = new Wishlist;
            $wishlist->session_id = Session::getId();
            $wishlist->product_id = $request->product_id;
            if (!Auth::check()) {
                $wishlist->user_id = 0;
            }
            else{
                $wishlist->user_id = Auth::user()->id;
            }
        }
        $wishlist->save();
        $data = view('includes.wishlist')->render();
        return response()->json(['msg' => 'Product Added successfully','data' => $data]);
    }

    public function cartqtyupdate(Request $request){
    
        $update_cart = Cart::where('id',$request->cart_id)->update(['quantity'=>$request->quantity]);
        $get_cart = Cart::where('id',$request->cart_id)->first();
        $get_product = Product::where('id',$get_cart->product_id)->first();
        if($get_product->weight_units == 'gm'){
            $into_kg = $get_product->weight / 1000;
            $product_price = $get_product->mrp_price / $into_kg;
        }else{
            $product_price = $get_product->mrp_price;
        }
        $item_price = $get_cart->quantity * $product_price;
        $update_cart_price = Cart::where('id',$request->cart_id)->update(['item_price'=>$item_price]);
        $data = ['item_price' => format_money($item_price)];
        return response()->json($data);
    }

    public function deleteWishList(Request $request,$id,$session_id)
    {
        if(!Auth::check()){
            $cart = Wishlist::where('session_id',$session_id)->where('id',$id)->first();
        }else{
            $cart = Wishlist::where('user_id',Auth::id())->where('id',$id)->first();
        }
       
        if ($cart) {
            $cart->delete();
            return back()->with('flash_success', 'Removed from Wishlist');
        }else{
            abort(404);
        }
    }

    public function delete_cart_item($cart_id)
    {
       $cart = Cart::where('id',$cart_id)->first();

       if ($cart) {
           $cart->delete();
           return back()->with('flash_success', 'Item deleted successfully. Cart Updated');
       }
       else{
            abort(404);
       }
    }

    public function checkPincode(Request $request)
    {
        $this->validate($request, [
            'pincode' => 'required|string',
        ]);

        $pincode = Pincode::where('pincode',$request->pincode)->first();
        if ($pincode) {
            Cart::where('session_id',Session::getId())
                ->update(['pincode_id'=>$pincode->id]);
            return back()->with('pincode_found', 'Avilable');
        }
        else{
            return back()->with('pincode_notfound', 'Given Pincode Not Avilable');
        }
    }

    public function delPincode(Request $request,$session_id)
    {
        Cart::where('session_id',Session::getId())
                ->update(['pincode_id'=>NULL]);
        return back()->with('pincode_found', 'Pincode Removed');
    }

    public static function getSubTotalPrice($session_id,$discount_amount)
    {
        $carts = Cart::where('session_id',Session::getId())->get();
        foreach ($carts as $cart) {
            $subtotal[] = $cart->product->selling_price*$cart->quantity;
        }
        $cartfirst = Cart::where('session_id',Session::getId())->first();
        $pincode = Pincode::find($cartfirst->pincode_id);
        if ($pincode && array_sum($subtotal) < 500) {
            $payable_amount = (array_sum($subtotal) - $discount_amount) + $pincode->delivery_charge;
        } 
        else{
            $payable_amount = array_sum($subtotal) - $discount_amount;
        }
        return $payable_amount;
        
    }

    public function showCheckout(Request $request)
    {

        if(!Auth::check()){
            $session_id = Session::getId();
            $carts = Cart::where('session_id',$session_id)->get();
            $isCouponCheck = Cart::where('session_id',$session_id)->wherenotNull('coupon_id')->first();
            $user_id = $session_id;
        }else{
            $carts = Cart::where('user_id',Auth::id())->get();
            $user_id = Auth::id();
            $user_info = User::find(Auth::id());
            $isCouponCheck = Cart::where('user_id',Auth::id())->wherenotNull('coupon_id')->first();

        }

        $orders = new Order;
        $orders->order_id = 'FRET'.getRandomString(2).time();
        $orders->status = 'draft';
        if(!Auth::check()){
            $orders->session_id = Session::getId();
            $orders->user_id = 0;
        }else{
            $orders->user_id = Auth::id();
        }
    
        $orders->save();

        $order_price = 0;
        foreach ($carts as $key => $item) {
            $total_price = 0;
            $get_product = Product::where('id',$item->product_id)->first();
            $add_orders = array('order_id' => $orders->id,'product_id'=>$item->product_id,'mrp_price'=> $item->item_price,'quantity'=>$item->quantity );
            OrderList::create($add_orders);
            $order_price += $item->item_price;
        }
        $order_total = $order_price;
        $total_pay_price = $order_price + $request->shipping;

        $update_orders = Order::where('id',$orders->id)->update(['order_price'=>$order_total,'payable_price' =>$total_pay_price ]); 
        
        $title = "Checkout | Fresh Eat";
        $desc = "Checkout | Fresh Eat";
        $order_info = Order::where('id',$orders->id)->first();
        
        if ($isCouponCheck) {
            $isCoupon = 1;
            $coupon = Coupon::find($isCouponCheck->coupon_id);
        }
        else{
            $isCoupon = 0;
            $coupon = '';
        }
        return redirect('/checkout/'.$order_info->order_id)->with('success','Checkout success');
        
    }

    public function coupon_apply(Request $request){
        
        $dt = \Carbon\Carbon::now();
        $check_coupon = Coupon::where('coupon_code',$request->coupon_code)->whereRaw('"'.$dt.'" between `created_at` and `validity_till`')->first();
        if(!empty($check_coupon)){

        }
        dd($check_coupon);
    }

    public function direct_checkout(){

        if(!Auth::check()){
            $session_id = Session::getId();
            $carts = Cart::where('session_id',$session_id)->get();
        }else{
            $carts = Cart::where('user_id',Auth::id())->get();
            $user_info = User::find(Auth::id());

        }

        $orders = new Order;
        $orders->order_id = 'FRET'.getRandomString(2).time();
        $orders->status = 'draft';
        if(!Auth::check()){
            $orders->session_id = Session::getId();
            $orders->user_id = 0;
        }else{
            $orders->user_id = Auth::id();
        }
        $orders->save();
        $order_price = 0;
        foreach ($carts as $key => $item) {
            $total_price = 0;
            $get_product = Product::where('id',$item->product_id)->first();
            $add_orders = array('order_id' => $orders->id,'product_id'=>$item->product_id,'mrp_price'=> $item->item_price,'quantity'=>$item->quantity );
            OrderList::create($add_orders);
            $order_price += $item->item_price;
        }
        $order_total = $order_price;
        $total_pay_price = $order_price;

        $update_orders = Order::where('id',$orders->id)->update(['order_price'=>$order_total,'payable_price' =>$total_pay_price ]); 
        
        $title = "Checkout | Fresh Eat";
        $desc = "Checkout | Fresh Eat";
        $order_info = Order::where('id',$orders->id)->first();

        return redirect('/checkout/'.$order_info->order_id)->with('success','Checkout success');

    }
}
