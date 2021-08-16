<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Submenu extends Model
{
    use HasFactory;

    public $table = "submenus";
	public $fillable = [
		'id', 'name', 'module', 'icon', 'menu_id'
	];
	public $searchable = [
		'id', 'name', 'module', 'icon', 'menu_id'
	];
	public $timestamps = false;

    /**
	 * Relacionamentos
	 */
	public function menu(): HasOne
    {
		return $this->hasOne(Menu::class, 'menu_id');
	}

	public function pagesubmenu(): HasMany
    {
		return $this->hasMany(PageSubmenu::class);
	}
}
