<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Media;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MediaController extends Controller
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
        $media = Media::all();
        return view('admin.media.index', ['media' => $media]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
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
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:128',
            'media_cat' => 'required',
            'title'     => 'required'
        ]);
        $media = $request->file('media');
        $uploadedMedia = time().'.'.$media->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $media->move($destinationPath, $uploadedMedia);
        $media = new Media();
        $media->title = $request->title;
        $media -> media = $uploadedMedia;
        $media -> media_cat = $request -> media_cat;
        $media -> save();
        Session::flash('success-message', 'Media Added Successfully!');
        return redirect()->route('media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::find($id);
        if($media){
            $link = asset('/images/'.$media->media);
            return view('admin.media.show', ['media' => $media, 'link' => $link]);
        }
        return view('admin.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.404');
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
        return view('admin.404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::find($id);
        $delmedia = 'images/'.$media->media;
        if(File::exists($delmedia)){
            File::delete($delmedia);
            $media->delete();
            Session::flash('success-message', 'Media Deleted Successfully');
            return redirect()->route('media.index');
        }else{
            return back()->withErrors(['Opps! there is some Error']);
        }
    }
}
