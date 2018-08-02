<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Post;
use App\Admin\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('categories')->orderBy('id', 'desc')->get();
        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $request->validate([
            'title'         =>  'required',
            'slug'          =>  'required|unique:posts',
            'featured_image'=>  'required',
            'body'          =>  'required',
            'img_alt_text'  =>  'required',
            'post_meta'     =>  'required'
        ]);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->featured_image = $request->featured_image;
        $post->body = $request->body;
        $post->img_alt_text = $request->img_alt_text;
        $post->post_meta = $request->post_meta;
        if($request->style){
            $post->style = $request->style;
        }else{
            $post->style = '';
        }
        $post->save();
        $post->categories()->sync($request->categories);
        return redirect()->route('post.index')->with('success-message', 'Post Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = Category::all();
        $post = Post::with('categories')->where('slug' , $slug)->first();
        return view('admin.post.edit', ['post'=>$post, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $post = Post::where('slug', $post)->first();
        $request->validate([
            'title'         =>  'required',
            'featured_image'=>  'required',
            'body'          =>  'required',
            'img_alt_text'  =>  'required',
            'post_meta'     =>  'required'
        ]);
        $post->title = $request->title;
        $post->featured_image = $request->featured_image;
        $post->body = $request->body;
        $post->img_alt_text = $request->img_alt_text;
        $post->post_meta = $request->post_meta;
        if($request->style){
            $post->style = $request->style;
        }else{
            $post->style = '';
        }
        $post->update();
        $post->categories()->sync($request->categories);
        return redirect()->route('post.index')->with('success-message', 'Post Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('slug', $id)->first();
        $post->delete();
        return redirect()->route('post.index')->with('success-message', 'Post has been deleted!');
    }
}
