<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Models\Menu;
use App\Models\Submenu;

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
        Paginator::useBootstrap();

        view()->composer('sidebar', function($view)
        {
            $menus = Menu::all();
            $submenus = Submenu::all();
            
            $view->with('menus', $menus);
            $view->with('submenus', $submenus);
        });

        view()->composer('header', function($view)
        {
            $menus = Menu::getShortcuts();
            
            $view->with('menus', $menus);
        });

        view()->composer('breadcrumb', function($view)
        {
            $request = Menu::breadcrumb();
            
            $view->with('action', $request->first()->action);
            $view->with('module', $request->first()->module);
        });
    }
}
