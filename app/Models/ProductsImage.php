<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
	protected $table='products_images';
    protected $fillable=['products_id','image'];
     
}
