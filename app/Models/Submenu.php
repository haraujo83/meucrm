<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    public $table = "submenus";
	public $fillable = [
		'name', 'module', 'icon', 'menu_id'
	];
	public $searchable = [
		'name', 'module', 'icon', 'menu_id'
	];
	public $timestamps = false;

    /**
	 * Relacionamentos
	 */
	public function menu() {
		return $this->hasOne(Menu::class, 'menu_id');
	}

	public function pagesubmenu() {
		return $this->hasMany(PageSubmenu::class);
	}
}
