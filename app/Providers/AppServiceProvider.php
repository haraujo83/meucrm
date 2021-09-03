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

        view()->composer('search/index', function($view)
        {
            $request = Menu::newButton();

            $titleButton = $request->first()->new . ' ' . strtolower($request->first()->module_singular);

            $view->with('titleButton', $titleButton);
        });

        $this->registerValidationRules();

        $paramsDefault = [
            'name',
            'labelText',
            'value' => null,
            'attribs' => [],
        ];
        $paramsDefault2 = [
            'attribs' => [],
        ];
        $paramsDefault3 = [
            'name',
            'labelText',
            'value' => null,
            'list' => [],
            'attribs' => [],
        ];

        Form::component('bsText', 'components.form.bs-text', $paramsDefault);

        Form::component('bsDate', 'components.form.bs-date', $paramsDefault);

        Form::component('bsCpf', 'components.form.bs-cpf', $paramsDefault);

        Form::component('bsMoney', 'components.form.bs-money', $paramsDefault);

        Form::component('bsNumber', 'components.form.bs-number', $paramsDefault);

        Form::component('bsPercent', 'components.form.bs-percent', $paramsDefault);

        Form::component('bsEmail', 'components.form.bs-email', $paramsDefault);

        Form::component('bsPhone', 'components.form.bs-phone', $paramsDefault);

        Form::component('bsDateRange', 'components.form.bs-date-range', $paramsDefault);

        Form::component('bsBtnStore', 'components.form.bs-btn-store', $paramsDefault2);

        Form::component('bsBtnCancel', 'components.form.bs-btn-cancel', $paramsDefault2);

        Form::component('bsSelect2', 'components.form.bs-select2', $paramsDefault3);
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
