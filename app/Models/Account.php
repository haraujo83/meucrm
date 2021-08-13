<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model para tabela accounts
 */
class Account extends Model
{
    use HasFactory;

    public $table = 'accounts';
    public $fillable = [
        'id', 'name', 'date_entered', 'date_modified', 'modified_user_id', 'created_by', 'description',
        'deleted', 'assigned_user_id', 'account_type', 'billing_address_street', 'billing_address_city',
        'billing_address_state', 'billing_address_postalcode', 'billing_address_country', 'website',
        'parent_id', 'cnpj', 'razao_social', 'billing_address_number', 'billing_address_bairro',
        'account_status', 'porte', 'account_situacao', 'codigo_siav', 'lead_source', 'frequencia',
        'perfil_conta', 'frequencia_lead', 'frequencia_venda', 'consultor_prosp_id', 'codigo_sap',
        'date_followup', 'rating_conta', 'termometro', 'motivo', 'crediline_user', 'crediline_pass'
    ];

    public $timestamps = false;
}
