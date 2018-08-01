<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function categories(){
        return $this->belongsToMany('App\Admin\Category', 'category_post');
    }
}
