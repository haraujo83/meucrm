<?php

namespace App\Models;

use App\Traits\PaginateWithSearch;

use App\Models\BaseModel;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class Action extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'actions';
	public $fillable = ['text', 'action'];
	public $searchable = ['text', 'action'];

    public $timestamps = false;
}
