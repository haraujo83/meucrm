<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    public $table = 'actions';
	public $fillable = ['text', 'action'];
	public $searchable = ['text', 'action'];

    public $timestamps = false;
}
