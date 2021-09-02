<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
/**
 *
 */
class UpdateFieldsLeadsLastName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('fields')
            ->where('name', '=', 'last_name')
            ->update([
                'label' => 'Sobrenome'
            ]);
    }
}
