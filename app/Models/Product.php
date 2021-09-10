<?php

namespace App\Models;

use App\Helpers\StructureResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

/**
 * Model para tabela products
 */
class Product extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    protected $table = 'products';

    public $timestamps = false;

    /**
     * Retorna lista de produtos, em pares id => name
     * @param string $default
     * @return array
     */
    public function getProductList(string $default = '-- Todos --'): array
    {
        $rows = self::query()
            ->select(['submodule', 'name'])
            ->get();

        $structureResult = new StructureResult();

        return $structureResult->getTraitList($rows, $default, 'submodule', 'name');
    }
}
