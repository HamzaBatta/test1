<?php

namespace App\Providers;
use App\Models\Slider;
use App\Models\Category;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*',function($view){
            $master_categories = Category::orderBy('id','ASC')->get();
            $view->with('master_categories',$master_categories);
        });
        view()->composer('*',function($view){
            $master_sliders = Slider::orderBy('id','ASC')->get();
            $view->with('master_sliders',$master_sliders);
        });
    }
}
