<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function posts(){
        return $this->belongsToMany('App\Admin\Post', 'category_post')->orderBy('id', 'desc');
    }
}
