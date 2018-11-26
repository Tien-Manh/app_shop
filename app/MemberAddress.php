<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberAddress extends Model
{
    protected $table = 'users_address';
    public $fillable = ['user_id', 'phone', 'gender', 'province', 'ward', 'created_at', 'updated_at'];
}
