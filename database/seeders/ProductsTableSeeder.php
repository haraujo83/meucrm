<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Traits\TraitSeeder;
use Illuminate\Database\Seeder;
use App\Models\Product as Model;

/**
 * Seeder para tabela products
 */
class ProductsTableSeeder extends Seeder
{
    use TraitSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->smartySeeder(new Model(), [
            ['id' => 1, 'name' => 'Financiamento', 'submodule' => 'LeadsFinanciamento'],
            ['id' => 2, 'name' => 'Home Equity', 'submodule' => 'LeadsHomeequity'],
            ['id' => 3, 'name' => 'Consórcio', 'submodule' => 'LeadsConsorcio'],
        ]);
    }
}
