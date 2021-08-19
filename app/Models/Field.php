<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class Field extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'fields';
    public $fillable = [
        'name', 'label', 'module'
    ];

    public $timestamps = false;

    /**
     * Retorna os fields para montar a tabela do resultado
     * @param string $module
     * @return array
     */
    public function returnFieldsResult(string $module): array
	{
		return self::query()
            ->join('fields_search', 'fields_search.field_id', '=', 'fields.id_table')
            ->join('users', 'users.id_table', '=', 'fields_search.user_id')
			->where('module', '=', $module)
			->where('show_search', 0)
		    ->where('fields.deleted', 0)
            ->select('name as field', 'label', 'width', 'align')
		    ->get()->toArray()
        ;
    }

    /**
     * Retorna o registro de fieldSearch
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'fields_search', 'field_id', 'user_id');
    }
}
