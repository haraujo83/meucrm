<?php

namespace App\Models;

use App\Traits\PaginateWithSearch;
use App\Models\BaseModel;
use App\Traits\TrataBuilder;
use App\Traits\TrataCollection;


class Leads extends BaseModel
{
    use PaginateWithSearch, TrataCollection, TrataBuilder;

    public $table = 'leads';
	public $fillable = ['fist_name', 'last_name', 'phone_mobile', 'date_entered'];
	public $searchable = ['fist_name', 'last_name', 'phone_mobile', 'date_entered'];

}
