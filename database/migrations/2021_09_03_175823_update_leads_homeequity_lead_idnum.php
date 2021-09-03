<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class UpdateLeadsHomeequityLeadIdnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::update(DB::raw('update leads_homeequity
        join leads on leads.parent_id = leads_homeequity.id
        set leads_homeequity.lead_idnum = leads.idnum'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::update(DB::raw('update leads_homeequity
        set lead_idnum = null'));
    }
}
