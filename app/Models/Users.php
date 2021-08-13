<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model para tabela users
 */
class Users extends Model
{
    use HasFactory;

    public $table = 'users';
    public $fillable = [
        'id', 'user_name', 'user_hash', 'system_generated_password', 'pwd_last_changed',
        'first_name', 'last_name', 'reports_to_id', 'is_admin', 'description', 'date_entered',
        'date_modified', 'modified_user_id', 'created_by', 'title', 'department', 'phone_home',
        'phone_mobile', 'phone_work', 'phone_other', 'status', 'address_street', 'address_city',
        'address_state', 'address_country', 'address_postalcode', 'deleted', 'employee_status',
        'messenger_type', 'is_group', 'matricula', 'cpf', 'data_admissao', 'data_demissao', 'rg',
        'birthdate', 'segmento', 'codigo_consultor', 'usuario_r4', 'senha_r4', 'perfil',
        'acesso_itau_status', 'racf'
    ];

    public $timestamps = false;
}
