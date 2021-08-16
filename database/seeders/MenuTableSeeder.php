<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\TraitSeeder;
use App\Models\Menu as Model;

class MenuTableSeeder extends Seeder
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
            ['id' => 1, 'name' => 'Contatos', 'module' => 'contacts', 'icon' => 'fa fa-user-check'],
            ['id' => 2, 'name' => 'Leads', 'module' => 'leads', 'icon' => 'fa fa-user'],
            ['id' => 3, 'name' => 'Oportunidades', 'module' => 'opportunities', 'icon' => 'fa fa-search-dollar'],
            ['id' => 4, 'name' => 'Contratações', 'module' => 'contractors', 'icon' => 'fas fa-file-invoice-dollar'],
            ['id' => 5, 'name' => 'Avaliações', 'module' => 'valuations', 'icon' => 'fa fa-drafting-compass'],
            ['id' => 6, 'name' => 'Empreendimentos', 'module' => 'developments', 'icon' => 'fa fa-city'],
            ['id' => 7, 'name' => 'Contas', 'module' => 'accounts', 'icon' => 'fas fa-wallet'],
            ['id' => 8, 'name' => 'Financeiro', 'module' => 'financials', 'icon' => 'fas fa-file-invoice-dollar'],
            ['id' => 9, 'name' => 'Admin', 'module' => '', 'icon' => ''],
        ]);
    }
}
