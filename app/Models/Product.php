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
        $q = self::query()
            ->select(['id', 'name']);

        $rows = [];
        foreach ($q->lazy() as $row) {
            $rows[$row->id] = $row->name;
        }

        return $rows;
    }
}
