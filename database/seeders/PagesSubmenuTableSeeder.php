<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSubmenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages_submenus')->insert([
            // profiles
            ['id' => 1, 'submenu_id' => 1, 'action_id' => 1],
            ['id' => 2, 'submenu_id' => 1, 'action_id' => 2],
            ['id' => 3, 'submenu_id' => 1, 'action_id' => 3],
            ['id' => 4, 'submenu_id' => 1, 'action_id' => 4],

            // users
            ['id' => 5, 'submenu_id' => 2, 'action_id' => 1],
            ['id' => 6, 'submenu_id' => 2, 'action_id' => 2],
            ['id' => 7, 'submenu_id' => 2, 'action_id' => 3],
            ['id' => 8, 'submenu_id' => 2, 'action_id' => 4],
        ]);
    }
}
