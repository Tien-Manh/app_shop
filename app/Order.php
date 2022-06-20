<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $fillable = ['customer_id', 'date_order', 'total', 'payment', 'order_active', 'message', 'deal', 'created_at', 'updated_at'];
}
