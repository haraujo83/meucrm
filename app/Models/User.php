<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

use App\Helpers\StructureResult;

/**
 * Model para tabela users
 */
class User extends Authenticatable
{
    use PaginateWithSearch, TraitCollection, TraitBuilder, Notifiable;

    public $table = 'users';
    public $fillable = [
        'id',
        'user_name', 'user_hash', 'system_generated_password', 'pwd_last_changed',
        'first_name', 'last_name', 'reports_to_id', 'is_admin', 'description', 'date_entered',
        'date_modified', 'modified_user_id', 'created_by', 'title', 'department', 'phone_home',
        'phone_mobile', 'phone_work', 'phone_other', 'status', 'address_street', 'address_city',
        'address_state', 'address_country', 'address_postalcode', 'deleted', 'employee_status',
        'messenger_type', 'is_group', 'matricula', 'cpf', 'data_admissao', 'data_demissao', 'rg',
        'birthdate', 'segmento', 'codigo_consultor', 'usuario_r4', 'senha_r4', 'perfil',
        'acesso_itau_status', 'racf'
    ];

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'char';

    /**
     * @return string
     */
    public function name(): string
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * Retorna lista de usuários ativos em pares id => name
     * @return array
     */
    public function getUserList(): array
    {
        $rows = self::query()
            ->select('id', DB::raw("concat(trim(first_name), ' ', trim(last_name)) descricao"))
            ->where('deleted', 0)
            ->where('status', 'active')
            ->where('first_name', '!=', '')
            ->orderBy('descricao')
            ->get();

        $structureResult = new StructureResult();

        return $structureResult->getTraitList($rows);
    }

    /**
     * Retorna o registro de lead
     * @return BelongsTo
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'assigned_user_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function reportsTo(): HasOne
    {
        return $this->hasOne(__CLASS__, 'id', 'reports_to_id');
    }

    /**
     * Retorna o registro de fieldSearch
     * @return BelongsToMany
     */
    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class);
    }
}
