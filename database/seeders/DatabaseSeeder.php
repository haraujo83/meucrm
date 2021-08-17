<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 *
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $seeders = [
			MenuTableSeeder::class,
			SubMenuTableSeeder::class,
			ActionsTableSeeder::class,
			PagesMenuTableSeeder::class,
			PagesSubmenuTableSeeder::class,
            ProductsTableSeeder::class,
		];

		foreach ($seeders as $seeder) {
			$this->call($seeder);
		}
    }
}
