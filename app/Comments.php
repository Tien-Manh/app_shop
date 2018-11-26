<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    public $fillable = ['user_id', 'product_id', 'text_comment', 'created_at'];
}
