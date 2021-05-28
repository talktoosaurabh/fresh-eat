<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderList extends Model
{
	protected $table      = 'order_lists';
    protected $guarded = [];

    public function get_product(){
        $product = Product::where('id',$this->product_id)->first();
        return $product ?? '';
    }
}
