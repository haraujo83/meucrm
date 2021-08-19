<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class Submenu extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

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
	public function menu(): HasOne
    {
		return $this->hasOne(Menu::class, 'menu_id');
	}

	public function pagesubmenu(): HasMany
    {
		return $this->hasMany(PageSubmenu::class);
	}
}
