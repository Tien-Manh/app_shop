<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'products_image';
    public $fillable = ['product_id, image', 'created_at', 'updated_at'];
}
