<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Form;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Helpers\Valid;

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
    public function boot(): void
    {
        Paginator::useBootstrap();

        view()->composer('sidebar', function ($view) {
            $menus = Menu::all();
            $submenus = Submenu::all();

            $view->with('menus', $menus);
            $view->with('submenus', $submenus);
        });

        view()->composer('header', function ($view) {
            $menus = Menu::getShortcuts();

            $view->with('menus', $menus);
        });

        view()->composer('breadcrumb', function ($view) {
            $request = Menu::breadcrumb();

            $view->with('action', $request->first()->action);
            $view->with('module', $request->first()->module);
        });

        view()->composer('template', function($view)
        {
            $request = Menu::breadcrumb();
            $module = strtolower($request->first()->module);

            $directoryJs = $extensaoJs = 'js';
            $directoryCss = $extensaoCss = 'css';

            $filenameJs = $directoryJs.'/'.$module.'.'.$extensaoJs;
            file_exists($filenameJs) ? $existJs = true : $existJs = false;

            $filenameCss = $directoryCss.'/'.$module.'.'.$extensaoCss;
            file_exists($filenameCss) ? $existCss = true : $existCss = false;

            $view->with('module', $module);
            $view->with('existJs', $existJs);
            $view->with('existCss', $existCss);
        });

        $this->registerValidationRules();

        Form::macro('bsText', function (
            string $name,
            string $labelText,
            array $class = [],
            array $attribs = []
        ) {
            $class = array_merge($class, ['form-control', 'form-control-sm']);
            $classStr = implode(' ', $class);
            $attribs = array_merge($attribs, ['class' => $classStr]);

            $label = Form::label($name, $labelText);
            $field = Form::text($name, null, $attribs);

            echo <<<A
            <div class="col-md-4">
                <div class="form-group">
                    $label
                    $field
                </div>
            </div>
A;
        });

        //@include('error', ['field' => $field])

        Form::macro('bsEmail', function (
            string $name,
            string $labelText,
            array $class = [],
            array $attribs = []
        ) {
            $class = array_merge($class, ['form-control', 'form-control-sm']);
            $classStr = implode(' ', $class);
            $attribs = array_merge($attribs, ['class' => $classStr]);

            $label = Form::label($name, $labelText);
            $field = Form::email($name, null, $attribs);

            echo <<<A
            <div class="col-md-4">
                <div class="form-group">
                    $label
                    $field
                </div>
            </div>
A;
        });

        Form::macro('bsSelect2', function (
            string $name,
            string $labelText,
            array $list = [],
            array $class = [],
            array $attribs = []
        ) {
            $class = array_merge($class, ['form-control', 'form-control-sm', 'data-select2']);
            $classStr = implode(' ', $class);
            $attribs = array_merge($attribs, ['class' => $classStr]);

            $label = Form::label($name, $labelText);
            $field = Form::select($name, $list, null, $attribs);

            echo <<<A
            <div class="col-md-4">
                <div class="form-group">
                    $label
                    $field
                </div>
            </div>
A;
        });
    }

    /**
	 * Registra regras personalizadas de validação
	 *
	 * @return void
	 */
	private function registerValidationRules() 
    {
		// Valida um número de CNPJ
		Validator::extend('cnpj', function ($attribute, $number, $parameters) 
        {
			return Valid::cnpj($number);
		});

		// Verifica se é um CPF ou CNPJ válido
		Validator::extend('cpf', function ($attribute, $number, $parameters) 
        {
			return Valid::cpf($number);
		});

	}
}
