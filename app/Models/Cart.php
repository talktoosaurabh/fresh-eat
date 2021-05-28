<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsImage;
use App\Models\Product;

class Cart extends Model
{
	protected $table      = 'carts';
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function get_product_image(){
    	$product_img = ProductsImage::where('products_id',$this->product_id)->where('is_featured',1)->first();
    	return $product_img->image ?? '';
    }
    public function get_product(){
    	$get_product = Product::where('id',$this->product_id)->first();
    	return $get_product ?? '';
    }
    public function get_product_default_image(){
        $product_img = ProductsImage::where('products_id',$this->product_id)->where('is_featured',1)->first();
        if(!empty($product_img)){
            $img_url = url('/public/assets/images/products/'.$product_img->image);
        }else{
            $img_url = url('/public/assets/images/fresh_default.jpg');
        }
        return $img_url;
    }
}
