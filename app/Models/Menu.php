<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menus";
	public $timestamps = false;

    /**
	 * Relacionamentos
	 */
	public function submenu() {
		return $this->belongsTo(Submenu::class);
	}
}
