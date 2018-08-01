<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
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
        $menuitems = DB::table('menus')->orderBy('position', 'asc')->get();
        return view('admin.menu.index', ['menuitems'=>$menuitems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'link'  =>  'required',
            'position'  =>  'required'
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->save();
        return redirect()->route('menu.index')->with('success-message', 'Menu Item Added Successfully!');
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
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('admin.menu.edit', ['menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'link'  =>  'required',
            'position'  =>  'required'
        ]);
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->update();
        return redirect()->route('menu.index')->with('success-message', 'Menu Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success-message', 'Menu Deleted Successfully!');
    }
}
