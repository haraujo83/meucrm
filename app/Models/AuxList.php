<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model para tabela aux_list
 */
class AuxList extends Model
{
    use HasFactory;

    public $table = 'aux_list';
    public $fillable = [
        'id', 'type_list', 'descricao', 'deleted', 'id_list'
    ];

    public $timestamps = false;
}
