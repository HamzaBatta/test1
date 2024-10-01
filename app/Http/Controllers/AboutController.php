<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:about-list|about-create|about-edit|about-delete', ['only' => ['index','store']]);
        $this->middleware('permission:about-create', ['only' => ['create','store']]);
        $this->middleware('permission:about-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:about-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $abouts = About::OrderBy('id','DESC')->get();
        return view('admin.about.index',compact('abouts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $abouts = About::orderBy('id','DESC')->get();
        return view('admin.about.create',compact('abouts'));

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "en_details" =>'required',
            "ar_details" =>'required',
            "en_title" =>'required',
            "ar_title" =>'required',]);

        $about =new About();
        $about ->user_id =Auth::id();
        $about ->en_details = $request->en_details;
        $about ->ar_details = $request->ar_details;
        $about ->en_title = $request->en_title;
        $about ->ar_title = $request->ar_title;
        $about ->photo = $request ->photo;
        $about ->save();

        Session::flash('message','about created successfully');
        return redirect()->route('abouts.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.about.show',compact('about'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.about.edit',compact('about'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $this->validate($request, [
            "en_details" =>'required',
            "ar_details" =>'required',
            "en_title" =>'required',
            "ar_title" =>'required',]);


        $about ->user_id =Auth::id();
        $about ->en_details = $request->en_details;
        $about ->ar_details = $request->ar_details;
        $about ->en_title = $request->en_title;
        $about ->ar_title = $request->ar_title;
        $about ->photo = $request ->photo;
        $about ->save();

        Session::flash('message','about updated successfully');
        return redirect()->route('abouts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        Session::flash('delete-massage','about delete successfully');
        return redirect()->route('about.index');

    }
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $abouts = About::query()
            ->where('en_title', 'LIKE', "%{$search}%")
            ->orWhere('ar_title', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('admin.about.search', compact('abouts'));
    }
}
