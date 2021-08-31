<?php

use Illuminate\Database\Migrations\Migration;

/**
 *
 */
class UpdateFieldsParcelaUltima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('fields')
            ->where('name', '=', 'parcela_ultima')
            ->update([
                'label' => 'Última parcela'
            ]);
    }
}
