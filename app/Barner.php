<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barner extends Model
{
    protected $table = 'baner_details';
    public $fillable = ['baner_image', 'baner_title', 'baner_content', 'baner_content_one', 'baner_content_two', 'created_at', 'updated_at'];
}
