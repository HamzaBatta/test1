<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\About;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitorContact;



class WebsiteController extends Controller
{
    public function get_image($name)
    {

        $file = Storage::exists('galleries/' . $name);

        if ($file) {
            $file = Storage::download('galleries/' . $name);
            return $file;
        } else {
            return false;
        }
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return view('website.post', compact('post'));
        } else {
            return \Response::view('website.errors.404', array(), 404);
        }
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $posts = $category->post()->orderBy('posts.id', 'DESC')->paginate(6);
            return view('website.category', compact('category', 'posts'));
        } else {
            return \Response::view('website.errors.404', array(), 404);
        }
    }

    public function submitContactForm(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'message' => $request->message,
        ];
        Mail::to('hamzatb202@gmail.com')->send(new VisitorContact($data));

        Session::flash('message', 'Thank you for your email');
        return redirect()->route('contact.show');
    }

    public function showContactForm()
    {
        return view('website.contact');
    }

    public function about()
    {
        $abouts = About::all();
        return view('website.about', compact('abouts'));
    }


    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        $posts = Post::orderBy('id', 'DESC')->get();
        $categories = Post::orderBy('id', 'DESC')->get();
        $abouts = About::orderBy('id', 'DESC')->get();

        return view('website.index', compact('sliders', 'abouts', 'posts', 'categories'));
    }
}
