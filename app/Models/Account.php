<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

/**
 * Model para tabela accounts
 */
class Account extends BaseModel
{
    use PaginateWithSearch;
    use TraitBuilder;
    use TraitCollection;

    public $table = 'accounts';
    public $fillable = [
        'name', 'date_entered', 'date_modified', 'modified_user_id', 'created_by', 'description',
        'deleted', 'assigned_user_id', 'account_type', 'billing_address_street', 'billing_address_city',
        'billing_address_state', 'billing_address_postalcode', 'billing_address_country', 'website',
        'parent_id', 'cnpj', 'razao_social', 'billing_address_number', 'billing_address_bairro',
        'account_status', 'porte', 'account_situacao', 'codigo_siav', 'lead_source', 'frequencia',
        'perfil_conta', 'frequencia_lead', 'frequencia_venda', 'consultor_prosp_id', 'codigo_sap',
        'date_followup', 'rating_conta', 'termometro', 'motivo', 'crediline_user', 'crediline_pass',
        'id'
    ];

    public $searchable = [
        'name', 'date_entered', 'date_modified', 'modified_user_id', 'created_by', 'description',
        'deleted', 'assigned_user_id', 'account_type', 'billing_address_street', 'billing_address_city',
        'billing_address_state', 'billing_address_postalcode', 'billing_address_country', 'website',
        'parent_id', 'cnpj', 'razao_social', 'billing_address_number', 'billing_address_bairro',
        'account_status', 'porte', 'account_situacao', 'codigo_siav', 'lead_source', 'frequencia',
        'perfil_conta', 'frequencia_lead', 'frequencia_venda', 'consultor_prosp_id', 'codigo_sap',
        'date_followup', 'rating_conta', 'termometro', 'motivo', 'crediline_user', 'crediline_pass',
        'id'
    ];

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

    /**
     * Retorna o registro de lead
     * @return BelongsTo
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'id', 'account_id');
    }
}
