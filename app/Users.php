<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    public $fillable = ['first_name', 'name', 'name_login', 'email', 'avatar', 'password', 'role', 'active', 'created_at', 'updated_at'];
}
