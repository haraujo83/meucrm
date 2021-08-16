<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    use HasFactory;

    public $table = "shortcuts";
	public $fillable = ['menu_id'];
	public $searchable = ['menu_id'];
	public $timestamps = false;

	/**
	 * Relacionamentos
	 */
	public function menu() {
		return $this->hasOne(Menu::class, 'menu_id');
	}
}
