<?php

use Illuminate\Database\Migrations\Migration;

/**
 *
 */
class UpdateFieldsTemImovelList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('fields')
            ->where('name', '=', 'tem_imovel_list')
            ->update([
                'label' => 'Tem imóvel'
        ]);
    }
}
