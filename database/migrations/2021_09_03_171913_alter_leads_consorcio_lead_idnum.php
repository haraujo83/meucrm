<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class AlterLeadsConsorcioLeadIdnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('leads_consorcio', function (Blueprint $table) {
            $table->unsignedBigInteger('lead_idnum', false)->nullable();
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
            $table->dropColumn('lead_idnum');
        });
    }
}
