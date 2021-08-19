<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class Shortcut extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = "shortcuts";
	public $fillable = ['menu_id'];
	public $searchable = ['menu_id'];
	public $timestamps = false;

	/**
	 * Relacionamentos
	 */
	 /**
     * Retorna o status do lead
     * @return HasOne
     */
	public function menu(): HasOne 
	{
		return $this->hasOne(Menu::class, 'menu_id');
	}
}
