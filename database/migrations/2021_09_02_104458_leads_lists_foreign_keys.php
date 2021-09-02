<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class LeadsListsForeignKeys extends Migration
{
    private static array $changes = [
        ['leads', 'primary_address_state', 'uf'],
        ['leads', 'lead_source', 'lead_source_dom'],
        ['leads', 'status', 'status_lead'],
        ['leads', 'sexo', 'contact_sexo'],
        ['leads_financiamento', 'tipo_imovel_list', 'tipo_imovel'],
        ['leads_financiamento', 'tem_imovel_list', 'tem_imovel'],
        ['leads_financiamento', 'rating'],
        ['leads_consorcio', 'tipo_consorcio'],
        ['leads_consorcio', 'escolha_grupo'],
        ['leads_consorcio', 'seguro'],
        ['leads_homeequity', 'tipo_imovel_list', 'tipo_imovel'],
        ['leads_homeequity', 'rating'],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        foreach (self::$changes as $row) {
            [$table, $column] = $row;
            $row[2] = $row[2] ?? $row[1];

            $tableTypeList = "list_$row[2]";

            Schema::table($table, function (Blueprint $table) use ($tableTypeList, $column) {
                $table->bigInteger($column)->unsigned()->change();

                $table
                    ->foreign($column)
                    ->references('id')
                    ->on($tableTypeList);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        foreach (self::$changes as $row) {
            [$table, $column] = $row;

            Schema::table($table, function (Blueprint $table) use ($column) {
                $foreign = $table->getTable()."_{$column}_foreign";

                $table->dropForeign($foreign);
            });
        }

        foreach (self::$changes as $row) {
            [$table, $column] = $row;

            Schema::table($table, function (Blueprint $table) use ($column) {
                $table->integer($column)->change();
            });
        }
    }
}
