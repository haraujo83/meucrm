<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $table = "menus";
	public $fillable = [
		'id', 'name', 'module', 'icon'
	];
	public $searchable = [
		'id', 'name', 'module', 'icon'
	];

	public $timestamps = false;

	/*public static function breadcrumb(){
		$request = $_SERVER['REQUEST_URI'];
		
		$module = "leads";
		$action = "index";
		if(substr_count($request, "/") > 0){
			$url = explode("/", $request);

			$module = $url[1];
			isset($url[2]) ? $action = $url[2] : $action = "index";
		}

		return self
		::join('pages_menus', 'pages_menus.menus_id', '=', 'menus.id')
		->join('actions', 'pages_menus.action_id', '=', 'actions.id')
			->where('menus.module', $module)
			->where('actions.action', $action)
			->select('actions.text AS action', 'menus.name AS module')
			->first()
			->get();
	}*/

    /**
	 * Relacionamentos
	 */
	public function submenu() {
		return $this->hasMany(Submenu::class);
	}

	public function pagemenu() {
		return $this->hasMany(PageMenu::class);
	}
}
