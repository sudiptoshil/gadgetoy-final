<?php

namespace App\Providers;

use App\model\Category\Category;
use App\model\Product\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

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

        View::composer('Client.Header.header', function ($view){
            $view->with('categories', Category::where('root_id',0)->get());
        });

        View::composer('Client.Footer.footer', function ($view){
            $view->with('products', Product::take(5)->orderBy('id','desc')->get());
        });

    }
}
