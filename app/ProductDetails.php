<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $table = 'product_details';
    public $fillable = ['product_id', 'price', 'sell_price', 'amount', 'width', 'height', 'Weight', 'color', 'created_at', 'updated_at'];
}
