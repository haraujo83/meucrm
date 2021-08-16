<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\TraitSeeder;
use App\Models\Submenu as Model;

class SubMenuTableSeeder extends Seeder
{
    use TraitSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->smartySeeder(new Model, [
            ['id' => 1, 'name' => 'Perfis', 'module' => 'profiles', 'icon' => 'fa users', 'menu_id' => 9],
            ['id' => 2, 'name' => 'Usuários', 'module' => 'users', 'icon' => 'fa users', 'menu_id' => 9],
        ]);
    }
}
