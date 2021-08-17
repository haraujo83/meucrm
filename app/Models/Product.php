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

    protected $table = "products";


}
