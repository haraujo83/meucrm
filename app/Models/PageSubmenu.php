<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSubmenu extends Model
{
    use HasFactory;

    public $table = "pages_submenus";
	public $fillable = [
		'id', 'action_id', 'submenu_id'
	];
	public $searchable = [
		'id', 'action_id', 'submenu_id'
	];

	public $timestamps = false;

    /**
	 * Relacionamentos
	 */
	public function submenu() {
		return $this->hasOne(Submenu::class, 'submenu_id');
	}

    public function action() {
		return $this->hasOne(Action::class, 'action_id');
	}
}
