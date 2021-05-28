<?php

use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Order;
use Auth as ATH;
use Session as SES;
use App\User;


function all_categories(){
     $categories  = Category::whereNull('parent_id')->where('status','Active')->orderBy('id','ASC')->get();
     return $categories ?? '';
}

function category_with_subcategory(){
    $categories  = Category::whereNull('parent_id')->where('status','Active')->orderBy('id','ASC')->get();
    foreach ($categories as $m => $list) {
     	$get_subcategory = Category::where('parent_id',$list->id)->where('status','Active')->orderBy('id','ASC')->get();
     	if(!$get_subcategory->isEmpty()){
     		$categories[$m]->sub_status = 1;
     		$categories[$m]->subcategory = $get_subcategory;
     	}else{
     		$categories[$m]->sub_status = 0;
     		$categories[$m]->subcategory = '';
     	}
    }
    return $categories ?? '';
}

function getRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return $string;
}

function get_cart_items(){
	if (!Auth::check()) {
		$cart_cnt = Cart::where('session_id',Session::getId())->get();
	}else{
		$cart_cnt = Cart::where('user_id',Auth::id())->get();
	}
	$item_price = 0;
	$total_price = 0;
	foreach ($cart_cnt as $m => $cart) {
		$cart_cnt[$m]->product_name = $cart->get_product()->name;
 		$cart_cnt[$m]->product_price = $cart->get_product()->mrp_price;
 		$cart_cnt[$m]->slug = $cart->get_product()->slug;
 		$cart_cnt[$m]->units = $cart->get_product()->weight_units;
 		$cart_cnt[$m]->prod_img = $cart->get_product_default_image();
 		$total_price  += $cart->item_price;
	}
	$data = ['cart_item' => $cart_cnt, 'order_total' => $total_price];
	return $data;
}

function cart_item_counts(){
	if (!Auth::check()) {
		$cart_cnt = Cart::where('session_id',Session::getId())->count('id');
	}else{
		$cart_cnt = Cart::where('user_id',Auth::id())->count('id');
	}
	return $cart_cnt;
}

function wishlist_item_counts(){
	if (!Auth::check()) {
		$wish_cnt = Wishlist::where('session_id',Session::getId())->count('id');
	}else{
		$wish_cnt = Wishlist::where('user_id',Auth::id())->count('id');
	}
	return $wish_cnt;
}

function format_money($amt){

	$format_money = $amt + 0;
	$currency_format = 'Rs. '.$format_money;
	return $currency_format;
}

function format_weight($wgt){
	$format_weight = preg_replace("/\.?0+$/", "", $wgt);
	return $format_weight;
}

function list_products($group,$count=''){
	if($count == ''){
		$count = 6;
	}
	$get_products = Product::whereRaw("find_in_set('".$group."',groups)")->orderBy('id','desc')->paginate($count);
	if($get_products->total() > 0){
		foreach ($get_products as $m => $list) {
			if(!empty($list->get_single_image())){
				$get_products[$m]->product_img = url('/public/assets/images/products/'.$list->get_single_image());
			}else{
				$get_products[$m]->product_img = url('/public/assets/images/fresh_default.jpg');
			}
			$get_products[$m]->category_name = $list->get_category()->name;
			$get_products[$m]->category_slug = $list->get_category()->slug;
		}
		return $get_products;
	}else{
		return $get_products;
	}
}

function get_orders_count($type=''){
	if(empty($type)){
		$get_orders = Order::all();
	}else{
		$get_orders = Order::where('status',$type)->get();
	}
	return $get_orders->count() ?? '';
}

function get_number_users(){
	$get_users = User::all();
	return $get_users->count();
}