<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;



class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:role-list|gallery-create|gallery-delete', ['only' => ['index','store']]);
        $this->middleware('permission:gallery-create', ['only' => ['create','store']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $galleries=Gallery::orderBy('id','DESC')->get();
        return view('admin.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            "photo"=>'required',
            'photo.*'=>'mimes:jpg,jpeg,png,gif,doc,docx,pdf,mp4,svg'
        ],
            [
                'photo,required'=>'Select photo',
                'photo,mimes'=>'file must be jpg,jpeg,png,gif,doc,docx,pdf'
            ]
        );
        foreach ($request->photo as $photo){
            $gallery = new Gallery();
            $gallery->user_id=Auth::id();
            if($save=Storage::put('galleries',$photo))
                $gallery->photo=explode('/',$save)[1];
            $save =$gallery->save();
        }
        Session::flash('message','Photo uploaded successfully');

        return redirect()->route('galleries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        Storage::delete('galleries/'.$gallery->photo);
        $gallery->delete();
        Session::flash('delete-message','Photo deleted successfully');
        return redirect()->route('galleries.index');
    }
}
