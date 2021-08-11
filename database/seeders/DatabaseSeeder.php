<?php

namespace Database\Seeders;

use Database\Seeders\MenuTableSeeder;
use Database\Seeders\SubmenuTableSeeder;
use Database\Seeders\ActionsTableSeeder;
use Database\Seeders\PagesMenuTableSeeder;
use Database\Seeders\PagesSubmenuTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuTableSeeder::class);
        $this->call(SubmenuTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(PagesMenuTableSeeder::class);
        $this->call(PagesSubmenuTableSeeder::class);
    }
}
