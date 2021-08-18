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

    public static function getAuxList($typeList) 
    {
		return self
		::where('type_list', '=', $typeList)
		    ->where('deleted', '=', '0')
            ->select('id', 'descricao')
		    ->get();
	}

    /**
     * Retorna o registro de lead pela fonte do lead
     * @return BelongsTo
     */
    public function leadSourceLead(): BelongsTo
    {
        return $this->belongsTo(Leads::class, 'lead_source', 'id');
    }

    /**
     * Retorna o registro de lead pelo status
     * @return BelongsTo
     */
    public function statusLead(): BelongsTo
    {
        return $this->belongsTo(Leads::class, 'status', 'id');
    }
}
