<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class AlterFields2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $showTrue = ['184', '391', '409', '410', '395', '549', 
                     '417', '515', '536', '435', '459', '440',
                     '398', '445', '456', '424', '450', '117',
                     '412', '403', '449', '452', '180', '392',
                     '393', '394', '446', '541', '411', '222',
                     '406'];

        DB::table('fields')
            ->whereIn('id_table', $showTrue)
            ->update([
                "show_search" => '1'
        ]);

        $columnCenter = ['184', '409', '410', '417', '440',
                     '398', '445', '403', '449', '452', '411'];
                     
        DB::table('fields')
            ->whereIn('id_table', $columnCenter)
            ->update([
                "align" => 'center'
        ]);

        $columnWidth5 = ['391', '417'];
                     
        DB::table('fields')
            ->whereIn('id_table', $columnWidth5)
            ->update([
                "width" => '5'
        ]);

        $columnWidth10 = ['536', '440', '412'];
                     
        DB::table('fields')
            ->whereIn('id_table', $columnWidth10)
            ->update([
                "width" => '10'
        ]);

        $columnWidth15 = ['398', '445', '452'];
                     
        DB::table('fields')
            ->whereIn('id_table', $columnWidth15)
            ->update([
                "width" => '15'
        ]);

        $columnWidth30 = ['456', '117', '222', '406'];
                     
        DB::table('fields')
            ->whereIn('id_table', $columnWidth30)
            ->update([
                "width" => '30'
        ]);

        $columnWidth40 = ['459'];
                     
        DB::table('fields')
            ->whereIn('id_table', $columnWidth40)
            ->update([
                "width" => '40'
        ]);

        $columnWidth50 = ['549'];
                     
        DB::table('fields')
            ->whereIn('id_table', $columnWidth50)
            ->update([
                "width" => '50'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
