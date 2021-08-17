<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model para tabela aux_list
 */
class AuxList extends Model
{
    use HasFactory;

    public $table = 'aux_list';
    public $fillable = [
        'type_list', 'descricao', 'deleted', 'id_list'
    ];

    public $timestamps = false;


    /**
     * Retorna lista em pares id => descricao
     *
     * @param string $typeList
     * @return array
     */
    public static function getAuxList(string $typeList): array
    {
		$tipos = self::where('type_list', '=', $typeList)

    /**
     * Retorna lista em pares id => descricao
     *
     * @param string $typeList
     * @return array
     */
    public static function getAuxList(string $typeList): array
    {
		$rows = self::where('type_list', '=', $typeList)
		    ->where('deleted', '=', '0')
            ->select('id', 'descricao')
		    ->get()->toArray();

        $rowsAssoc = [];
        foreach ($rows as $row) {
            $rowsAssoc[$row['id']] = $row['descricao'];
        }

        return $rowsAssoc;
	}

    /**
     * Retorna o registro de lead pela fonte do lead
     * @return BelongsTo
     */
    public function leadSourceLead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'lead_source', 'id');
    }

    /**
     * Retorna o registro de lead pelo status
     * @return BelongsTo
     */
    public function statusLead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'status', 'id');
    }
}
