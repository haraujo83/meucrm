<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

use App\Helpers\StructureResult;
/**
 * Model para tabela aux_list
 */
class AuxList extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'aux_list';
    public $fillable = [
        'type_list', 'descricao', 'deleted', 'id_list'
    ];

    public $timestamps = false;

    /**
     * Retorna lista em pares id => descricao
     *
     * @param string $typeList
     * @param string $default Texto da opção Todos. Se string vazia, não traz esta opção
     * @return array
     */
    public static function getAuxList(string $typeList, string $default = '-- Todos --'): array
    {
		$rows = self::query()
            ->where('type_list', '=', $typeList)
		    ->where('deleted', '=', '0')
            ->select('id', 'descricao')
		    ->get();

        $structureResult = new StructureResult();

        return $structureResult->getTraitList($rows, $default);
	}

    /**
     * Retorna o registro de lead pela fonte do lead
     * @return BelongsTo
     */
    public function leadSourceLead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'lead_source', 'id');
    }

    /**
     * Retorna o registro de lead pelo status
     * @return BelongsTo
     */
    public function statusLead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'status', 'id');
    }
}
