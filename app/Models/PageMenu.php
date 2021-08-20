<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class PageMenu extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = "pages_menus";
	public $fillable = [
		'action_id', 'menu_id'
	];
	public $searchable = [
		'action_id', 'menu_id'
	];

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

	 /**
     * Retorna o status do lead
     * @return HasOne
     */
    public function action(): HasOne 
	{
		return $this->hasOne(Action::class, 'action_id');
	}
}
