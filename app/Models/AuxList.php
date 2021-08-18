<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Traits\PaginateWithSearch;

use App\Models\BaseModel;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;
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
     * @return array
     */
    public static function getAuxList(string $typeList): array
    {
		$rows = self::query()
            ->where('type_list', '=', $typeList)
		    ->where('deleted', '=', '0')
            ->select('id', 'descricao')
		    ->get();

        $rowsAssoc = [
            '' => '-- Todos --',
        ];
        foreach ($rows as $row) {
            $rowsAssoc[$row['id']] = $row['descricao'];
        }

        return $rowsAssoc;
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
