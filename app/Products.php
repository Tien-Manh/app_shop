<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    public $fillable = ['cate_id, product_name', 'product_active', 'description', 'product_slug', 'product_remove', 'product_image', 'category_name', 'created_at', 'updated_at', 'short_description'];
}
