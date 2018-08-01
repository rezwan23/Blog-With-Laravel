<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Sitemeta;

class SiteMetaController extends Controller
{

    private $issetMeta;
    public function __construct(){
        $this->middleware('auth');
        $this->issetMeta = Sitemeta::all()->count();
    }
    public function show(){
        $meta = Sitemeta::find(1);
        return view('admin.sitemeta',['meta'=>$meta]);
    }
    public function update(Request $request){
        if($this->issetMeta==0){
            $meta = new Sitemeta();
            $meta->sitename = $request->sitename;
            $meta->logo = $request->logo;
            $meta->favicon = $request->favicon;
            $meta->footertext = $request->footertext;
            $meta->save();
            return redirect()->route('sitemeta.show')->with('success-message', 'Site Meta Added!');
        }
        $meta = Sitemeta::find(1);
        $meta->sitename = $request->sitename;
        $meta->logo = $request->logo;
        $meta->favicon = $request->favicon;
        $meta->footertext = $request->footertext;
        $meta->update();
        return redirect()->route('sitemeta.show')->with('success-message', 'Site meta updated successfully!');
    }
}
