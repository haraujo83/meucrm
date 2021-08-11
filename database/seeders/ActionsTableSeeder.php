<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            ['id' => 1, 'text' => 'Listar', 'action' => 'index'],
            ['id' => 2, 'text' => 'Incluir', 'action' => 'create'],
            ['id' => 3, 'text' => 'Alterar', 'action' => 'edit'],
            ['id' => 4, 'text' => 'Excluir', 'action' => 'destroy'],
            ['id' => 5, 'text' => 'Incluir Financiamento', 'action' => 'create_financing'],
            ['id' => 6, 'text' => 'Incluir Home', 'action' => 'create_homeequity'],
            ['id' => 7, 'text' => 'Incluir Consórcio', 'action' => 'create_consortium'],
        ]);
    }
}
