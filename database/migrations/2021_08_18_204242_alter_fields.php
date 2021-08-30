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
    public function up()
    {
        Schema::table('fields', function(Blueprint $table){
            $table->bigIncrements('id_table');
            $table->boolean('show_search')->default(false);
            $table->string('align', 10)->default('left');
            $table->integer('width')->default('20');
        });

        /*$results = DB::table('fields')->select('id')->get();

        DB::table('fields')
            ->whereIn('id',$result->id)
            ->update([
                "show_search" => true
        ]);*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function(Blueprint $table){
            $table->dropColumn('id_table');
            $table->dropColumn('show_search');
            $table->dropColumn('align');
            $table->dropColumn('width');
        });
    }
}
