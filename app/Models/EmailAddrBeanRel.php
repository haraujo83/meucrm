<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Model para tabela email_addr_bean_rel
 */
class EmailAddrBeanRel extends Model
{
    use HasFactory;

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
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Leads::class, 'bean_id', 'id');
    }
}
