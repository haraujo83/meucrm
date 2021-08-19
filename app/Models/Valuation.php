<?php

namespace App\Models;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;
class Valuation extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;
}
