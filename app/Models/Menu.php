<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class Menu extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = "menus";
	public $fillable = [
		'name', 'module', 'icon'
	];
	public $searchable = [
		'name', 'module', 'icon'
	];

	public $timestamps = false;

	public static function getShortcuts() 
	{
		return self
		::leftJoin('shortcuts', 'shortcuts.menu_id', '=', 'menus.id')
			->whereNotNull('shortcuts.menu_id')
			->get();
	}

	public static function breadcrumb()
	{
		$request = $_SERVER['REQUEST_URI'];

		$module = "leads";
		$action = "index";
		if(substr_count($request, "/") > 0){
			$url = explode("/", $request);

			if(substr_count($request, "?") > 0){
				$url1 = explode("?", $url[1]);
				$module = $url1[0];
			}else{
				$module = $url[1];
			}

			isset($url[2]) ? $action = $url[2] : $action = "index";
		}

		return self
		::join('pages_menus', 'pages_menus.menu_id', '=', 'menus.id')
		->join('actions', 'pages_menus.action_id', '=', 'actions.id')
			->where('menus.module', $module)
			->where('actions.action', $action)
			->select('actions.text AS action', 'menus.name AS module', 'menus.module_singular AS module_singular', 'menus.new AS new')
			->get();
	}

	public static function newButton()
	{
		$request = $_SERVER['REQUEST_URI'];

		$module = "leads";
		$action = "index";
		if(substr_count($request, "/") > 0){
			$url = explode("/", $request);

			if(substr_count($request, "?") > 0){
				$url1 = explode("?", $url[1]);
				$module = $url1[0];
			}else{
				$module = $url[1];
			}

			isset($url[2]) ? $action = $url[2] : $action = "index";
		}

		return self
		::join('pages_menus', 'pages_menus.menu_id', '=', 'menus.id')
		->join('actions', 'pages_menus.action_id', '=', 'actions.id')
			->where('menus.module', $module)
			->where('actions.action', $action)
			->select('menus.module_singular AS module_singular', 'menus.new AS new')
			->get();
	}

    /**
     * @return HasMany
     */
	public function submenu(): HasMany
    {
		return $this->hasMany(Submenu::class);
	}

    /**
     * @return HasMany
     */
	public function pagemenu(): HasMany
    {
		return $this->hasMany(PageMenu::class);
	}

	/**
     * @return HasMany
     */
	public function shortcut(): HasMany
	{
		return $this->hasMany(Shortcut::class);
	}
}
