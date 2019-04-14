<?php

namespace App\Providers;

use View;
use App\Models\Category as Category;
use Illuminate\Support\ServiceProvider;

class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.menu', function ($view) {
            //get all parent categories with their subcategories
            $categories = Category::roots()->get();
            $tree       = Category::getTreeHP($categories);
            //attach the categories to the view.
            $view->with(compact('tree'));
        });

    }
}
