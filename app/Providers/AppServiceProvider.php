<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.nav-right',function($view)
        {
            $count_send=\App\send::where('state','0')->where('state','0')->get()->Count();
            $setting=\App\setting::first();
            $product=\App\product::first();
            $laboratory=\App\laboratory::first();
            $setting->product=$product->name;
            $setting->laboratory=$laboratory->name;
            $view->with(compact('count_send','setting'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
