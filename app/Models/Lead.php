<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

/**
 *
 */
class Lead extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'leads';
    public $fillable = ['first_name', 'last_name', 'phone_mobile', 'date_entered', 'idnum', 'account_id'];
    public $searchable = ['first_name', 'last_name', 'phone_mobile', 'date_entered', 'idnum', 'account_id'];
    public $incrementing = false;

    /**
     * @param int $idnum
     * @return $this
     */
    public function getForShow(int $idnum): self
    {
        return self::where('idnum', $idnum)
            ->where('deleted', 0)
            ->select(
                'id',
                'idnum',
                'assigned_user_id',
                'first_name',
                'last_name',
                'phone_mobile',
                'status',
                'account_id',
                'opportunity_id',
                'birthdate',
                'cpf',
                'sexo',
                'telefone_contato',
                'parent_type',
                'parent_id',
                'cod_empreendimento',
            )
            ->firstOrFail();
    }

    /**
     * @param int $idnum
     * @return string
     */
    public function getId(int $idnum): string
    {
        return self::where('idnum', $idnum)
            ->where('deleted', 0)
            ->select('id')
            ->firstOrFail();
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * Retorna a conta
     * @return HasOne
     */
    public function account(): HasOne
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    /**
     * Retorna a fonte do lead
     * @return HasOne
     */
    public function leadSource(): HasOne
    {
        return $this->hasOne(ListLeadSourceDom::class, 'id', 'lead_source');
    }

    /**
     * Retorna o status do lead
     * @return HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(ListStatusLead::class, 'id', 'status');
    }

    /**
     * Retorna o sexo
     * @return HasOne
     */
    public function sexo(): HasOne
    {
        return $this->hasOne(ListContactSexo::class, 'id', 'sexo');
    }

    /**
     * Retorna o registro de relação do email
     * @return HasMany
     */
    public function emailAddrBeanRel(): HasMany
    {
        return $this->hasMany(EmailAddrBeanRel::class, 'bean_id', 'id');
    }

    /**
     * Retorna o responsável pelo lead
     * @return HasOne
     */
    public function assignedUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'assigned_user_id');
    }

    /**
     * Retorna o registro do financiamento do lead
     * @return HasOne
     */
    public function leadFinanciamento(): HasOne
    {
        return $this->hasOne(LeadFinanciamento::class, 'id', 'parent_id');
    }
}
