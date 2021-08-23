<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\TraitSeeder;
use App\Models\Action as Model;

class ActionsTableSeeder extends Seeder
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
            ['id' => 1, 'text' => 'Listar', 'action' => 'index', 'class' => '', 'icon' => ''],
            ['id' => 2, 'text' => 'Novo', 'action' => 'create', 'class' => 'btn btn-info', 'icon' => 'fas fa-plus'],
            ['id' => 3, 'text' => 'Alterar', 'action' => 'edit', 'class' => 'btn btn-info', 'icon' => 'fa fa-edit'],
            ['id' => 4, 'text' => 'Excluir', 'action' => 'destroy', 'class' => 'btn btn-danger', 'icon' => 'fa fa-trash'],
            ['id' => 5, 'text' => 'Visualizar', 'action' => 'show', 'class' => 'btn btn-info', 'icon' => 'fa fa-edit'],
            ['id' => 6, 'text' => 'Novo Financiamento', 'action' => 'create_financing', 'class' => 'btn btn-info', 'icon' => 'fas fa-plus'],
            ['id' => 7, 'text' => 'Novo Home', 'action' => 'create_homeequity', 'class' => 'btn btn-info', 'icon' => 'fas fa-plus'],
            ['id' => 8, 'text' => 'Novo Consórcio', 'action' => 'create_consortium', 'class' => 'btn btn-info', 'icon' => 'fas fa-plus'],
        ]);
    }
}
