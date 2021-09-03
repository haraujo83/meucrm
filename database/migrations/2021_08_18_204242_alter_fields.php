<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class AlterFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropPrimary();
        });

        Schema::table('fields', function (Blueprint $table) {
            $table->bigIncrements('idnum');
            $table->boolean('show_search')->default(false);
            $table->string('align', 10)->default('left');
            $table->integer('width')->default('20');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropColumn('idnum');
            $table->dropColumn('show_search');
            $table->dropColumn('align');
            $table->dropColumn('width');
        });
    }
}
