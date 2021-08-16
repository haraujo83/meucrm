<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortcuts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortcuts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->unique();

            $table
                ->foreign('menu_id')
                ->references('id')
                ->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shortcuts');
    }
}
