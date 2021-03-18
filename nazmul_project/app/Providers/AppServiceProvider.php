<?php

namespace App\Providers;
use View;
use App\Models\Category;
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
        //View::share('name','Md. Nazmul huda');
        View::composer('front-end.includes.header', function($view){
//In the provider all of content dynamic easily...
          $view->with('categories',Category::where('publication_status', 1)->get());

        });
    }
}
