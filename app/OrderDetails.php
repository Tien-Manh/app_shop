<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
   protected $table = 'order_detailts';
   public $fillable = ['oreder_id', 'product_id', 'quantity', 'unit_price', 'created_at', 'updated_at'];
}
