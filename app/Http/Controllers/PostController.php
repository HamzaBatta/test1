<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','store']]);
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->get();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('en_name','ASC')->pluck('en_name','id');
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,
            [
            'photo'=>'required',
            'en_title'=>'required',
            'ar_title'=>'required',
            'en_details'=>'required',
            'ar_details'=>'required'
        ]);
        $post=new Post();
        $post->user_id = Auth::id();
        $post->photo=$request->photo;
        $post->en_title=$request->en_title;
        $post->ar_title=$request->ar_title;
        $post->en_details=$request->en_details;
        $post->ar_details=$request->ar_details;
        $post ->slug = str_slug($request->en_title);
        $post->save();

        $post->categories()->sync($request->category_id,false);
        Session::flash('message','post created successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('en_name','ASC')->pluck('en_name','id');
        return view('admin.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'photo'=>'required',
            'en_title'=>'required',
            'ar_title'=>'required',
            'en_details'=>'required',
            'ar_details'=>'required'
        ]);

        $post->user_id = Auth::id();
        $post->photo=$request->photo;
        $post->en_title=$request->en_title;
        $post->ar_title=$request->ar_title;
        $post->en_details=$request->en_details;
        $post->ar_details=$request->ar_details;
        $post ->slug = str_slug($request->en_title);
        $post->save();

        $post->categories()->sync($request->category_id);
        Session::flash('message','post created successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('delete-message','post deleted successfully');
        return redirect()->route('posts.index');
    }
}
