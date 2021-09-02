<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\TraitSeeder;
use App\Models\PageMenu as Model;

/**
 *
 */
class PagesMenuTableSeeder extends Seeder
{
    use TraitSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $n = 0;
        $idGen = static function () use (&$n) {
            $n++;

            return $n;
        };

        $this->smartySeeder(new Model(), [
            // contacts
            ['id' => $idGen(), 'menu_id' => 1, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 1, 'action_id' => 2],
            ['id' => $idGen(), 'menu_id' => 1, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 1, 'action_id' => 4],

            // leads
            ['id' => $idGen(), 'menu_id' => 2, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 2, 'action_id' => 2],
            ['id' => $idGen(), 'menu_id' => 2, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 2, 'action_id' => 4],
            ['id' => $idGen(), 'menu_id' => 2, 'action_id' => 5],

            // opportunities
            ['id' => $idGen(), 'menu_id' => 3, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 3, 'action_id' => 5],
            ['id' => $idGen(), 'menu_id' => 3, 'action_id' => 6],
            ['id' => $idGen(), 'menu_id' => 3, 'action_id' => 7],
            ['id' => $idGen(), 'menu_id' => 3, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 3, 'action_id' => 4],

            // contractors
            ['id' => $idGen(), 'menu_id' => 4, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 4, 'action_id' => 2],
            ['id' => $idGen(), 'menu_id' => 4, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 4, 'action_id' => 4],

            // valuations
            ['id' => $idGen(), 'menu_id' => 5, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 5, 'action_id' => 2],
            ['id' => $idGen(), 'menu_id' => 5, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 5, 'action_id' => 4],

            // developments
            ['id' => $idGen(), 'menu_id' => 6, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 6, 'action_id' => 2],
            ['id' => $idGen(), 'menu_id' => 6, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 6, 'action_id' => 4],

            // accounts
            ['id' => $idGen(), 'menu_id' => 7, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 7, 'action_id' => 2],
            ['id' => $idGen(), 'menu_id' => 7, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 7, 'action_id' => 4],

            // financials
            ['id' => $idGen(), 'menu_id' => 8, 'action_id' => 1],
            ['id' => $idGen(), 'menu_id' => 8, 'action_id' => 2],
            ['id' => $idGen(), 'menu_id' => 8, 'action_id' => 3],
            ['id' => $idGen(), 'menu_id' => 8, 'action_id' => 4],
        ]);
    }
}
