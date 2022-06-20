<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likeview extends Model
{
    protected $table = 'likeviews';
    public $fillable = ['prodct_id', 'user_id', 'created_at'];
}
