<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $messageBag;

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  =>  'required',
            'slug'  =>  'required|unique:categories'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        Session::flash('success-message', 'Category added Successfully!');
        return redirect()->route('categories.index');
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
    public function edit($category)
    {
        $singlecat = Category::where('slug', $category)->first();
        return view('admin.category.edit', ['category'=> $singlecat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $oldCategory = Category::where('slug', $category);
        $oldCat = $oldCategory->first();
        $errors = [];
        if($oldCat->name == $request-> name){
            array_push($errors, 'Category name is same');
            return redirect()->route('categories.edit', $oldCat->slug)->withErrors($errors);
        }else{
            $request->validate([
                'name'  =>  'required',
            ]);
            $oldCategory->update(['name' => $request->name]);
            Session::flash('success-message', 'Category Edited Successfully!');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cat = Category::find($request->id);
        $cat->delete();
        Session::flash('success-message', 'Category Deleted Successfully!');
        return redirect()->route('categories.index');
    }
}
