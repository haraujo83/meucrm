<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class UpdateLeadsConsorcioLeadIdnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::update(DB::raw('update leads_consorcio
        join leads on leads.parent_id = leads_consorcio.id
        set leads_consorcio.lead_idnum = leads.idnum'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::update(DB::raw('update leads_consorcio
        set lead_idnum = null'));
    }
}
