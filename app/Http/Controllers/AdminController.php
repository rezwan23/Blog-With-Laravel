<?php

namespace App\Http\Controllers;

use App\Admin\Category;
use App\Admin\Media;
use App\Admin\Page;
use App\Admin\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $posts = Post::all()->count();
        $cats = Category::all()->count();
        $media = Media::all()->count();
        $pages = Page::all()->count();
        return view('admin.dashboard', ['posts'=>$posts, 'cats'=>$cats, 'media'=>$media, 'pages'=>$pages]);
}
}
