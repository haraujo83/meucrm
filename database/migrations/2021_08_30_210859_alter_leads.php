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
        DB::table('leads')
            ->whereRaw('not exists (
            select 1 from accounts where accounts.id = leads.account_id)')
            ->update([
                'account_id' => null
            ]);

        Schema::table('leads', function (Blueprint $table) {
            $table->string('account_id', 36)
                //->charset('utf8')
                ->change();

            $table
                ->foreign('account_id')
                ->references('id')
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
