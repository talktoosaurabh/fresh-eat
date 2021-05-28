<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsImage;
use App\Models\Category;

class Product extends Model
{
	protected $table='products';
    protected $guarded = [];
    public function productsImage()
    {
        return $this->belongsTo('App\Models\ProductsImage','image');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function product_image(){
        return $this->hasOne('App\Models\ProductsImage','products_id','products_id')->select('products_images.id','products_images.products_id',\DB::raw("CONCAT('".url('/public/assets/images/products/')."/', products_images.image) AS image"));
    }

    public function get_single_image(){
    	$get_prod_img = ProductsImage::where('products_id',$this->id)->where('is_featured',1)->first();
    	return $get_prod_img->image ?? '';
    }

    public function get_sub_category(){
        $get_category = Category::where('id',$this->subcategory_id)->first();
        return $get_category->name ?? '';
    }

    public function get_category(){
        $get_category = Category::where('id',$this->category_id)->first();
        return $get_category ?? '';
    }

}
