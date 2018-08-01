<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
