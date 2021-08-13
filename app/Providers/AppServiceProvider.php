<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        view()->composer('sidebar', function($view)
        {
            $menus = Menu::all();
            $submenus = Submenu::all();
            //$shortcuts = Shortcuts::all();

            $view->with('menus', $menus);
            $view->with('submenus', $submenus);
        });

        view()->composer('breadcrumb', function($view)
        {
            //$request = Menu::breadcrumb();
            
            $view->with('action', 'Listar');
            $view->with('module', 'Contatos');
        });
    }
}
