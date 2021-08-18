<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Traits\PaginateWithSearch;

use App\Models\BaseModel;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class PageSubmenu extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = "pages_submenus";
	public $fillable = [
		'action_id', 'submenu_id'
	];
	public $searchable = [
		'action_id', 'submenu_id'
	];

	public $timestamps = false;

    /**
	 * Relacionamentos
	 */
	 /**
     * Retorna o status do lead
     * @return HasOne
     */
	public function submenu(): HasOne
	{
		return $this->hasOne(Submenu::class, 'submenu_id');
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
