<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.front._mainNave', function($view){
        $view->with('categories', Category::orderBy('name')->get());
        });
        view()->composer('front.blog._right_featured', function($view){
            $view->with('featured_posts', post:: where('is_featured',1)->where('status','published')->limit(2)->latest()->get());
        });
        view()->composer('front.blog._right_recent', function($view){
            $view->with('recent_posts', Post::with('category','author')->where('status','published')->limit(4)->latest()->get());
        });
    }
}
