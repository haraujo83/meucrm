<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $table = "submenus";
	public $timestamps = false;

    /**
	 * Relacionamentos
	 */
	public function menu() {
		return $this->belongsTo(Menu::class);
	}
}
