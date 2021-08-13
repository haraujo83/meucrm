<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model para tabela email_addresses
 */
class EmailAddress extends Model
{
    use HasFactory;

    public $table = 'email_addresses';
    public $fillable = [
        'id', 'email_address', 'email_address_caps', 'invalid_email', 'opt_out', 'date_created',
        'date_modified', 'deleted', 'created_by'
    ];

    public $timestamps = false;
}
