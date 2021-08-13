<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model para tabela email_addr_bean_rel
 */
class EmailAddrBeanRel extends Model
{
    use HasFactory;

    public $table = 'email_addr_bean_rel';
    public $fillable = [
        'id', 'email_address_id', 'bean_id', 'bean_module', 'primary_address', 'reply_to_address',
        'date_created', 'date_modified', 'deleted'
    ];

    public $timestamps = false;
}
