<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class AlterLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        //limpando registros com account_id indevido
        DB::table('leads')
            ->whereRaw('not exists (
            select 1 from accounts where accounts.id = leads.account_id)')
            ->update([
                'account_id' => null
            ]);

        Schema::table('leads', function (Blueprint $table) {
            $table->bigInteger('idnum')->autoIncrement()->change();
        });

        Schema::table('leads', function (Blueprint $table) {
            $table->unsignedBigInteger('account_idnum', false)->nullable();

            $table
                ->foreign('account_idnum')
                ->references('idnum')
                ->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign('leads_account_id_foreign');
        });
    }
}
