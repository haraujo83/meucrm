<?php

namespace App\Models;

use App\Helpers\FieldElement;
use App\Helpers\StructureResult;
use DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;
use Illuminate\Database\Query\Builder;

/**
 *
 */
class Field extends BaseModel
{
    use PaginateWithSearch;
    use TraitBuilder;
    use TraitCollection;

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
            ->where('show_search', 1)
            ->where('fields.deleted', 0)
            ->select('name as field', 'label', 'width', 'align', 'type')
            ->get()->toArray();
    }

    /**
     * @param int $userId
     * @param string $module
     * @return array
     */
    public function getModuleFieldsListNotSelected(int $userId, string $module): array
    {
        $rows = self::query()
            ->select('id_table', 'label')
            ->where('fields.module', '=', $module)
            ->where('fields.deleted', '=', 0)
            ->where('fields.show_search', '=', 1)
            ->whereNotExists(function (Builder $query) use ($userId) {
                $query->select(DB::raw(1))
                    ->from('fields_search')
                    ->whereRaw('fields_search.field_id = fields.id_table')
                    ->where('fields_search.user_id', '=', $userId);
            })
        ;

        $structureResult = new StructureResult();

        return $structureResult->getTraitList($rows->get(), '', 'id_table', 'label');
    }

    /**
     * @param array $modules
     * @return array
     */
    public function modulesFields(array $modules): array
    {
        $rows = self::query()
            ->select('module', 'name', 'label', 'len', 'required', 'default_value', 'type', 'type_list')
            ->whereIn('fields.module', $modules)
            ->where('fields.deleted', '=', 0)
            ->get()
        ;

        $rowsAssoc = [];
        foreach ($rows as $row) {
            $moduleKey = strtolower($row->module);

            if (!isset($rowsAssoc[$moduleKey])) {
                $rowsAssoc[$moduleKey] = [];
            }

            $fieldElement = new FieldElement();

            $fieldElement
                ->setName($row->name)
                ->setType($row->type)
                ->setTypeList($row->type_list)
                ->setLabel($row->label)
                ->setDefaultValue($row->default_value)
                ->setRequired($row->required)
                ->setLen($row->len)
                ;

            $rowsAssoc[$moduleKey][$row->name] = $fieldElement;
        }

        return $rowsAssoc;
    }

    /**
     * Retorna o registro de fieldSearch
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'fields_search', 'field_id', 'user_id');
    }
}
