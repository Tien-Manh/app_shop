<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    public $fillable = ['parent_id', 'cate_name', 'cate_slug', 'cate_active', 'cate_image', 'created_at', 'updated_at'];

   // public function category()
   //  {
   //  	return $this->belongstoMany('App\Shopfoods', 'categoriedetails', 'id', 'id_categorie');
   //  }
}
