<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\TraitSeeder;
use App\Models\Menu as Model;

/**
 *
 */
class MenuTableSeeder extends Seeder
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
            ['id' => 1, 'name' => 'Contatos', 'module' => 'contacts', 'icon' => 'fa fa-user-check', 'new' => 'Novo', 'module_singular' => 'Contato'],
            ['id' => 2, 'name' => 'Leads', 'module' => 'leads', 'icon' => 'fa fa-user', 'new' => 'Novo', 'module_singular' => 'Lead'],
            ['id' => 3, 'name' => 'Oportunidades', 'module' => 'opportunities', 'icon' => 'fa fa-search-dollar', 'new' => 'Nova', 'module_singular' => 'Oportunidade'],
            ['id' => 4, 'name' => 'Contratações', 'module' => 'contractors', 'icon' => 'fas fa-file-signature', 'new' => 'Nova', 'module_singular' => 'Contratação'],
            ['id' => 5, 'name' => 'Avaliações', 'module' => 'valuations', 'icon' => 'fa fa-drafting-compass', 'new' => 'Nova', 'module_singular' => 'Avaliação'],
            ['id' => 6, 'name' => 'Empreendimentos', 'module' => 'developments', 'icon' => 'fa fa-city', 'new' => 'Novo', 'module_singular' => 'Empreendimento'],
            ['id' => 7, 'name' => 'Contas', 'module' => 'accounts', 'icon' => 'fas fa-wallet', 'new' => 'Nova', 'module_singular' => 'Conta'],
            ['id' => 8, 'name' => 'Financeiro', 'module' => 'financials', 'icon' => 'fas fa-file-invoice-dollar', 'new' => 'Novo', 'module_singular' => 'Financeiro'],
            ['id' => 9, 'name' => 'Admin', 'module' => '', 'icon' => '', 'new' => '', 'module_singular' => ''],
        ]);
    }
}
