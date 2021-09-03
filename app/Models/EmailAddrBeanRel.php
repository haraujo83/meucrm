<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

/**
 * Model para tabela email_addr_bean_rel
 */
class EmailAddrBeanRel extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'email_addr_bean_rel';
    public $fillable = [
        'email_address_id', 'bean_id', 'bean_module', 'primary_address', 'reply_to_address',
        'date_created', 'date_modified', 'deleted'
    ];

    public $timestamps = false;



    /**
     * Retorna o email
     * @return HasOne
     */
    public function emailAddress(): HasOne
    {
        return $this->hasOne(EmailAddress::class, 'id', 'email_address_id');
    }

    /**
     * Retorna o registro de lead
     * @return BelongsTo

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'bean_id', 'id');
    }*/
}
