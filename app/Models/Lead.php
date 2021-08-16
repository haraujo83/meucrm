<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lead extends Model
{
    use HasFactory;

    public $table = 'leads';
	public $fillable = ['fist_name', 'last_name', 'phone_mobile', 'date_entered'];
	public $searchable = ['fist_name', 'last_name', 'phone_mobile', 'date_entered'];

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
        return $this->hasOne(AuxList::class, 'id', 'lead_source')
            ->where('type_list', 'lead_source_dom');
    }

    /**
     * Retorna o status do lead
     * @return HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(AuxList::class, 'id', 'status')
            ->where('type_list', 'status_lead_list');
    }

    /**
     * Retorna o registro de relação do email
     * @return HasOne
     */
    public function emailAddrBeanRel(): HasOne
    {
        return $this->hasOne(EmailAddrBeanRel::class, 'bean_id', 'id')
            ->where('deleted', 0)
            ->where('bean_module', 'Leads');
    }

    /**
     * Retorna o responsável pelo lead
     * @return HasOne
     */
    public function userAssignedUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'assigned_user_id');
    }
}
