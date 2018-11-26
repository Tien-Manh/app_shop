<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $fillable = ['name', 'gender', 'email', 'address', 'number_phone', 'created_at', 'updated_at'];
}
