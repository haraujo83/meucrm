<?php

namespace Database\Seeders;

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
        $seeders = [
			MenuTableSeeder::class,
			SubmenuTableSeeder::class,
			ActionsTableSeeder::class,
			PagesMenuTableSeeder::class,
			PagesSubmenuTableSeeder::class,
		];

		foreach ($seeders as $seeder) {
			$this->call($seeder);
		}
    }
}
