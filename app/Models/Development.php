<?php

namespace App\Models;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;
use DB;

/**
 *
 */
class Development extends BaseModel
{
    use PaginateWithSearch;
    use TraitBuilder;
    use TraitCollection;

    public $table = 'ndops_empreendimento';

    public $timestamps = false;
    public $incrementing = false;

    /**
     * Retorna lista de contas, buscando parte do nome, em pares id => name
     * @param string|null $term
     * @return array
     */
    public function searchAccountList(?string $term): array
    {
        $q = self::query()
            ->select(['id', DB::raw('trim(name) name')])
            ->where('deleted', 0)
            ->where(DB::raw('trim(name)'), 'like', "%$term%")
            ->orderByRaw('trim(name)')
            ->get();

        $rows = [];
        foreach ($q as $row) {
            $rows[$row->id] = $row->name;
        }

        return $rows;
    }
}
