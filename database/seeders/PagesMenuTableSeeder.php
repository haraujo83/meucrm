<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages_menus')->insert([
            // contacts
            ['id' => 1, 'menu_id' => 1, 'action_id' => 1],
            ['id' => 2, 'menu_id' => 1, 'action_id' => 2],
            ['id' => 3, 'menu_id' => 1, 'action_id' => 3],
            ['id' => 4, 'menu_id' => 1, 'action_id' => 4],

            // leads
            ['id' => 5, 'menu_id' => 2, 'action_id' => 1],
            ['id' => 6, 'menu_id' => 2, 'action_id' => 2],
            ['id' => 7, 'menu_id' => 2, 'action_id' => 3],
            ['id' => 8, 'menu_id' => 2, 'action_id' => 4],

            // opportunities
            ['id' => 9, 'menu_id' => 3, 'action_id' => 1],
            ['id' => 10, 'menu_id' => 3, 'action_id' => 5],
            ['id' => 11, 'menu_id' => 3, 'action_id' => 6],
            ['id' => 12, 'menu_id' => 3, 'action_id' => 7],
            ['id' => 13, 'menu_id' => 3, 'action_id' => 3],
            ['id' => 14, 'menu_id' => 3, 'action_id' => 4],

            // contractors
            ['id' => 15, 'menu_id' => 4, 'action_id' => 1],
            ['id' => 16, 'menu_id' => 4, 'action_id' => 2],
            ['id' => 17, 'menu_id' => 4, 'action_id' => 3],
            ['id' => 18, 'menu_id' => 4, 'action_id' => 4],

            // valuations
            ['id' => 19, 'menu_id' => 5, 'action_id' => 1],
            ['id' => 20, 'menu_id' => 5, 'action_id' => 2],
            ['id' => 21, 'menu_id' => 5, 'action_id' => 3],
            ['id' => 22, 'menu_id' => 5, 'action_id' => 4],

            // developments
            ['id' => 23, 'menu_id' => 6, 'action_id' => 1],
            ['id' => 24, 'menu_id' => 6, 'action_id' => 2],
            ['id' => 25, 'menu_id' => 6, 'action_id' => 3],
            ['id' => 26, 'menu_id' => 6, 'action_id' => 4],

            // accounts
            ['id' => 27, 'menu_id' => 7, 'action_id' => 1],
            ['id' => 28, 'menu_id' => 7, 'action_id' => 2],
            ['id' => 29, 'menu_id' => 7, 'action_id' => 3],
            ['id' => 30, 'menu_id' => 7, 'action_id' => 4],

            // financials
            ['id' => 31, 'menu_id' => 8, 'action_id' => 1],
            ['id' => 32, 'menu_id' => 8, 'action_id' => 2],
            ['id' => 33, 'menu_id' => 8, 'action_id' => 3],
            ['id' => 34, 'menu_id' => 8, 'action_id' => 4],
        ]);
    }
}
