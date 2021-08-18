<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model para tabela products
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $timestamps = false;

    /**
     * Retorna lista de produtos, em pares id => name
     * @return array
     */
    public function getProductList(): array
    {
        $rows = self::query()
            ->select(['id', 'name'])
            ->get();

        $rowsAssoc = [
            '' => '-- Todos --',
        ];
        foreach ($rows as $row) {
            $rowsAssoc[$row->id] = $row->name;
        }

        return $rowsAssoc;
    }
}
