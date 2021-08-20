<?php

namespace App\Models;

use App\Helpers\StructureResult;
use DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;

class Field extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'fields';
    public $fillable = [
        'name', 'label', 'module'
    ];

    public $timestamps = false;

    /**
     * Retorna os fields para montar a tabela do resultado
     * @param string $module
     * @return array
     */
    public function returnFieldsResult(string $module): array
	{
		return self::query()
            ->join('fields_search', 'fields_search.field_id', '=', 'fields.id_table')
            ->join('users', 'users.id_table', '=', 'fields_search.user_id')
			->where('module', '=', $module)
			->where('show_search', 0)
		    ->where('fields.deleted', 0)
            ->select('name as field', 'label', 'width', 'align')
		    ->get()->toArray()
        ;
    }

    /**
     * @param int $userId
     * @param string $module
     * @return array
     */
    public function getModuleFieldsListNotSelected(int $userId, string $module): array
    {
        $rows = self::query()
            ->select('id_table', 'label')
            ->where('fields.module', '=', $module)
            ->where('fields.deleted', '=', 0)
            ->where('fields.show_search', '=', 1)
            ->whereNotExists(function (Builder $query) use ($userId) {
                $query->select(DB::raw(1))
                    ->from('fields_search')
                    ->whereRaw('fields_search.field_id = fields.id_table')
                    ->where('fields_search.user_id', '=', $userId);
            })
        ;

        $structureResult = new StructureResult();

        return $structureResult->getTraitList($rows->get(), '', 'id_table', 'label');
    }

    /**
     * Retorna o registro de fieldSearch
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'fields_search', 'field_id', 'user_id');
    }
}
