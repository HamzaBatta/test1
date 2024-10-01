<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $categories = Category::OrderBy('id','DESC')->get();
        return view('admin.category.index',compact('categories'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.category.create',compact('categories'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "photo" => 'required',
            "en_name" =>'required',
            "ar_name" =>'required',]);

        $category =new Category();
        $category ->user_id =Auth::id();
        $category ->en_name = $request->en_name;
        $category ->ar_name = $request->ar_name;
        $category ->slug = str_slug($request->en_name);
        $category ->photo = $request ->photo;
        $category ->save();

        Session::flash('message','category created successfully');
        return redirect()->route('categories.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show',compact('category'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            "photo" => 'required',
            "en_name" =>'required',
            "ar_name" =>'required',]);

        $category ->user_id =Auth::id();
        $category ->en_name = $request->en_name;
        $category ->ar_name = $request->ar_name;
        $category ->slug = str_slug($request->en_name);
        $category ->photo = $request ->photo;
        $category ->save();

        Session::flash('message','category updated successfully');
        return redirect()->route('categories.index');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('delete-massage','category delete successfully');
        return redirect()->route('category.index');
        //
    }
}
