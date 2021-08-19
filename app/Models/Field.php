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
    public function returnFieldsResult(String $module)
	{
		$rows = self::query()
        //->join('fields_search', 'fields_search.id', '=', 'fields.id_table')
        	->where('module', '=', $module)
			->where('show_search', '=', '0')
		    ->where('deleted', '=', '0')
            ->select('name as field', 'label', 'width', 'align')
		    ->get()->toArray();
        
        return $rows;
    }

    /**
     * Retorna o registro de fieldSearch
     * @return BelongsToMany
     */
    public function fieldSearch(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'fields_search');
    }

}
