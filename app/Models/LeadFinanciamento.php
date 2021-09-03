<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 */
class LeadFinanciamento extends Model
{
    use HasFactory;

    public $table = 'leads_financiamento';

    /**
     *
     * @return HasOne
     */
    public function tipoImovel(): HasOne
    {
        return $this->hasOne(ListTipoImovel::class, 'id', 'tipo_imovel_list');
    }

    /**
     *
     * @return HasOne
     */
    public function temImovel(): HasOne
    {
        return $this->hasOne(ListTemImovel::class, 'id', 'tem_imovel_list');
    }

    /**
     *
     * @return HasOne
     */
    public function empreendimento(): HasOne
    {
        return $this->hasOne(Development::class, 'id', 'empreendimento_id');
    }

    /**
     *
     * @return HasOne
     */
    public function rating(): HasOne
    {
        return $this->hasOne(ListRating::class, 'id', 'rating');
    }
}
