<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Page;

class PageController extends Controller
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
        $pages = Page::all();
        return view('admin.page.index', ['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $request->validate([
            'title' =>  'required',
            'slug'  =>  'required',
            'body'  =>  'required'
        ]);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->body = $request->body;
        if($request->style){
            $page->style = $request->style;
        }else{
            $page -> style = '';
        }
        $page->save();
        return redirect()->route('page.index')->with('success-message', 'Page Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('admin.page.edit', ['page'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->first();
        $request->validate([
            'title' =>  'required',
            'slug'  =>  'required',
            'body'  =>  'required'
        ]);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->body = $request->body;
        if($request->style){
            $page->style = $request->style;
        }else{
            $page -> style = '';
        }
        $page->update();
        return redirect()->route('page.index')->with('success-message', 'Page Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $page->delete();
        return redirect()->route('page.index')->with('success-message', 'Page Deleted Successfully!');
    }
}
