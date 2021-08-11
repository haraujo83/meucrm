<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submenus')->insert([
            ['id' => 1, 'name' => 'Perfis', 'module' => 'profiles', 'icon' => 'fa users', 'menu_id' => 9],
            ['id' => 2, 'name' => 'Usuários', 'module' => 'users', 'icon' => 'fa users', 'menu_id' => 9],
        ]);
    }
}
