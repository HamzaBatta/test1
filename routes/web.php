<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('about', [App\Http\Controllers\AboutController::class, 'index'])->name('index');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('abouts','App\Http\Controllers\AboutController');
    Route::resource('sliders','App\Http\Controllers\SliderController');
    Route::resource('galleries','App\Http\Controllers\GalleryController');
    Route::resource('categories','App\Http\Controllers\CategoryController');
    Route::resource('posts','App\Http\Controllers\PostController');
    Route::resource('users','App\Http\Controllers\UserController');
    Route::resource('roles','App\Http\Controllers\RoleController');
    Route::get('/search', [App\Http\Controllers\AboutController::class,'search'])->name('search');
});

Route::get('get_image/{url}',[App\Http\Controllers\WebsiteController::class,'get_image'])->name("getImage");

Route::get('/',[App\Http\Controllers\WebsiteController::class,'index'])->name('index');

Route::get('lang/{lang}',[App\Http\Controllers\LocalizationController::class,'index']);

Route::get('category/{slug}',[App\Http\Controllers\WebsiteController::class,'category'])->name('category');

Route::get('post/{slug}',[App\Http\Controllers\WebsiteController::class,'post'])->name('post');

Route::get('about',[App\Http\Controllers\WebsiteController::class,'about'])->name('about');

Route::get('contact',[App\Http\Controllers\WebsiteController::class,'showContactForm'])->name('contact.show');

Route::post('contact',[App\Http\Controllers\WebsiteController::class,'submitContactForm'])->name('contact.submit');



