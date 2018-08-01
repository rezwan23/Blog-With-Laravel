<?php

namespace App\Http\Controllers\User;

use App\Admin\Category;
use App\Admin\Message;
use App\Admin\Page;
use App\Admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    private $categories;
    private $recentPosts;
    private $footerPosts;
    private $imgPosts;
    private $morePosts;
    private $memuItems;
    private $footerpages;
    private $sitemeta;

    public function __construct()
    {
        $this->categories = Category::all();
        $this->recentPosts = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();
        $this->footerPosts = DB::table('posts')->limit(5)->get();
        $this->imgPosts = DB::table('posts')->orderBy('id', 'desc')->offset(10)->limit(9)->get();
        $this->morePosts = DB::table('posts')->orderBy('id', 'desc')->offset(5)->limit(5)->get();
        $this->memuItems = DB::table('menus')->orderBy('position', 'asc')->get();
        $this->footerpages = DB::table('pages')->orderBy('id', 'desc')->get();
        $this->sitemeta = DB::table('sitemetas')->first();
        if(!$this->sitemeta){
            return redirect()->route('emptydata');
        }
    }

    public function show($post)
    {
        $post = Post::with('categories')->where('slug', $post)->first();
        if($post == null){
            return view('errors.404');
        }
        return view('user.show', ['sitemeta'=> $this->sitemeta ,'footerpages'=>$this->footerpages, 'memuItems' => $this->memuItems, 'post' => $post, 'categories' => $this->categories, 'recentPosts' => $this->recentPosts, 'footerPosts' => $this->footerPosts, 'imgPosts' => $this->imgPosts, 'morePosts' => $this->morePosts]);
    }

    public function showCategoryPosts($category)
    {
        $categoryPosts = Category::with('posts')->where('slug', $category)->first();
        return view('user.category', ['sitemeta'=> $this->sitemeta ,'footerpages'=>$this->footerpages,'memuItems' => $this->memuItems, 'categoryPosts' => $categoryPosts, 'categories' => $this->categories, 'recentPosts' => $this->recentPosts, 'footerPosts' => $this->footerPosts, 'imgPosts' => $this->imgPosts, 'morePosts' => $this->morePosts]);
    }

    public function index()
    {
        $catPosts = Category::with('posts')->get();
        if($catPosts->count()==0){
            return redirect()->route('emptydata');
        }
        return view('user.index', ['sitemeta'=> $this->sitemeta ,'footerpages'=>$this->footerpages,'memuItems' => $this->memuItems, 'catPosts' => $catPosts, 'categories' => $this->categories, 'recentPosts' => $this->recentPosts, 'footerPosts' => $this->footerPosts, 'imgPosts' => $this->imgPosts, 'morePosts' => $this->morePosts]);
    }

    public function search(Request $request)
    {
        $string = $request->string;
        $posts = Post::where('body', 'LIKE', '%' . $string . '%')->get();
        return view('user.search', ['sitemeta'=> $this->sitemeta ,'footerpages'=>$this->footerpages,'memuItems' => $this->memuItems, 'string' => $string, 'posts' => $posts, 'categories' => $this->categories, 'recentPosts' => $this->recentPosts, 'footerPosts' => $this->footerPosts, 'imgPosts' => $this->imgPosts, 'morePosts' => $this->morePosts]);
    }
    public function showContactForm(){
        return view('user.contact', ['sitemeta'=> $this->sitemeta ,'footerpages'=>$this->footerpages,'memuItems' => $this->memuItems, 'categories' => $this->categories, 'recentPosts' => $this->recentPosts, 'footerPosts' => $this->footerPosts, 'imgPosts' => $this->imgPosts, 'morePosts' => $this->morePosts]);
    }
    public function postmessage(Request $request){
//        return $request;
        $request->validate([
            'name'      =>  'max:30',
            'subject'   =>  'required|max:50',
            'email'     =>  'required|email|max:30',
            'phone'     =>  'required|max:15',
            'message'   =>  'required|max:200'
        ]);
        $message = new Message();
        $message -> name = $request-> name;
        $message-> subject = $request-> subject;
        $message -> company = $request -> company;
        $message ->email = $request->email;
        $message-> phone = $request->phone;
        $message->message = $request->message;
        $message->save();
        return redirect()->route('showContactForm')->with('success-message', 'Message has been posted. We will contact you soon..');
    }
    public function showpage($slug){
        $page = Page::where('slug', $slug)->first();
        return view('user.page', ['sitemeta'=> $this->sitemeta ,'page'=>$page, 'footerpages'=>$this->footerpages,'memuItems' => $this->memuItems, 'categories' => $this->categories, 'recentPosts' => $this->recentPosts, 'footerPosts' => $this->footerPosts, 'imgPosts' => $this->imgPosts, 'morePosts' => $this->morePosts]);
    }
    public function emptydata(){
        return view('user.nodatapage');
    }
}
