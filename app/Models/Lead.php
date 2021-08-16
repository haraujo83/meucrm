<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public $table = 'leads';
	public $fillable = ['fist_name', 'last_name', 'phone_mobile', 'date_entered'];
	public $searchable = ['fist_name', 'last_name', 'phone_mobile', 'date_entered'];
}
