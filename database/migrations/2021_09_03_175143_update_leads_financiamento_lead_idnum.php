<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class UpdateLeadsFinanciamentoLeadIdnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::update(DB::raw('update leads_financiamento
        join leads on leads.parent_id = leads_financiamento.id
        set leads_financiamento.lead_idnum = leads.idnum'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::update(DB::raw('update leads_financiamento
        set lead_idnum = null'));
    }
}
