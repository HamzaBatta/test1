<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','store']]);
        $this->middleware('permission:slider-create', ['only' => ['create','store']]);
        $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $sliders = Slider::orderBy('id','DESC')->get();
        return view('admin.slider.index',compact('sliders'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sliders = Slider::orderBy('id','DESC')->get();
        return view('admin.slider.create',compact('sliders'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "photo" => 'required',
            "en_sub_title" =>'required',
            "ar_sub_title" =>'required',
            "en_title" =>'required',
            "ar_title" =>'required',]);

        $slider =new Slider();
        $slider ->user_id =Auth::id();
        $slider ->en_sub_title = $request->en_sub_title;
        $slider ->ar_sub_title = $request->ar_sub_title;
        $slider ->en_title = $request->en_title;
        $slider ->ar_title = $request->ar_title;
        $slider ->photo = $request ->photo;
        $slider ->save();

        Session::flash('message','slider created successfully');
        return redirect()->route('sliders.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.show',compact('slider'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            "photo" => 'required',
            "en_sub_title" =>'required',
            "ar_sub_title" =>'required',
            "en_title" =>'required',
            "ar_title" =>'required',]);

        $slider ->user_id =Auth::id();
        $slider ->en_sub_title = $request->en_sub_title;
        $slider ->ar_sub_title = $request->ar_sub_title;
        $slider ->en_title = $request->en_title;
        $slider ->ar_title = $request->ar_title;
        $slider ->photo = $request ->photo;
        $slider ->save();

        Session::flash('message','slider updated successfully');
        return redirect()->route('sliders.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        Session::flash('delete-massage','slider delete successfully');
        return redirect()->route('slider.index');
        //
    }
}
