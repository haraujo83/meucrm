<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
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

        DB::table('fields')
            ->where('name', '=', 'parcela_ultima')
            ->update([
                'label' => 'Última parcela'
            ]);

        DB::table('fields')
            ->where('name', '=', 'last_name')
            ->update([
                'label' => 'Sobrenome'
            ]);
    }
}
