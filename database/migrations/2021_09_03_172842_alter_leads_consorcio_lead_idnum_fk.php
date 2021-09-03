<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class AlterLeadsConsorcioLeadIdnumFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('leads_consorcio', function (Blueprint $table) {
            $table
                ->foreign('lead_idnum')
                ->references('idnum')
                ->on('leads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('leads_consorcio', function (Blueprint $table) {
            $table->dropForeign('leads_consorcio_lead_idnum_foreign');
        });
    }
}
