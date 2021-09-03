<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class UpdateLeadsAccountIdnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::update(DB::raw('update leads
        join accounts on leads.account_id = accounts.id
        set leads.account_idnum = accounts.idnum'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::update(DB::raw('update leads set account_idnum = null'));
    }
}
