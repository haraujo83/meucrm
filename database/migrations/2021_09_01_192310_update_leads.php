<?php

use Illuminate\Database\Migrations\Migration;

/**
 *
 */
class UpdateLeads extends Migration
{
    // tabela / coluna / tabela da lista sem o prefixo list_ (se não informada, será igual ao nome da coluna)
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
        /*['accounts', 'account_type'],
        ['accounts', 'billing_address_state', 'uf'],
        ['accounts', 'account_status'],
        ['accounts', 'account_situacao'],
        ['accounts', 'porte', 'accounts_porte'],
        ['accounts', '', ''],
        ['accounts', '', ''],
        ['accounts', '', ''],*/
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        foreach (self::$changes as $row) {
            [$tableUpdate, $columnUpdate] = $row;
            $row[2] = $row[2] ?? $row[1];

            $tableTypeList = "list_$row[2]";

            DB::update(DB::raw("update $tableUpdate
            join $tableTypeList on $tableUpdate.$columnUpdate = $tableTypeList.aux_list_id
            set $tableUpdate.$columnUpdate = $tableTypeList.id"));

            DB::update(DB::raw("update $tableUpdate set $columnUpdate = null where $columnUpdate not in (
                select id from $tableTypeList
            )"));
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
            [$tableUpdate, $columnUpdate] = $row;
            $row[2] = $row[2] ?? $row[1];

            $tableTypeList = "list_$row[2]";

            DB::update(DB::raw("update $tableUpdate
            join $tableTypeList on $tableUpdate.$columnUpdate = $tableTypeList.id
            set $tableUpdate.$columnUpdate = $tableTypeList.aux_list_id"));
        }
    }
}
