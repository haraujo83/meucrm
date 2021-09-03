<?php

namespace App\Models;

use App\Helpers\StructureResult;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class FieldSearch extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'fields_search';
    public $fillable = [
        'field_id', 'user_id'
    ];

    public $timestamps = false;


    /**
     * Retorna o registro de relação do field
     * @return BelongsTo
     */
    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class, 'field_id', 'idnum');
    }

    /**
     * Retorna o registro de relação do user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'idnum');
    }

    /**
     * @param int $userId
     * @param string $module
     * @return array
     */
    public function getModuleFieldsListSelected(int $userId, string $module): array
    {
        $rows = self::query()
            ->join('fields', 'fields.idnum', '=', 'fields_search.field_id')
            ->select('fields.idnum', 'fields.label')
            ->where('fields.module', '=', $module)
            ->where('fields_search.user_id', $userId)
            ->where('fields.deleted', '=', 0)
            ->where('fields.show_search', '=', 1)
        ;

        $structureResult = new StructureResult();

        return $structureResult->getTraitList($rows->get(), '', 'idnum', 'label');
    }
}
