<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function listResult($structure = false) {
        $data = app('request')->All();
    
        // Naturezas
        $leads  = new Leads;
        $leads = $leads->paginateWithSearch();
    
        // Elabora a estrutura do resultado
        $structureResult = [
          'columns' => [
            [
                'title' => 'Nome',
                'field' => 'first_name'
            ],
            [
                'title' => 'Sobrenome',
                'field' => 'last_name'
            ]
          ],
          'actions' => [
            [
              'class' => 'btn btn-info btn-alterar',
              'title' => 'Alterar',
              'icon' => 'fa fa-edit',
              'href' => '/leads/edit/{id}'
            ],
            [
              'class' => 'btn btn-danger btn-excluir',
              'title' => 'Excluir',
              'icon' => 'fa fa-trash',
              'href' => '/leads/destroy/{id}',
              'form' => [
                'method' => 'POST',
                'data-confirm' => 'Tem certeza que deseja excluir?'
              ],
            ]
          ],
          'data' => $leads,
          'filters' => array_filter($data),
        ];
    
        return $structure ? $structureResult : $leads;
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Leads $Leads)
    {
        $structureResult = $this->listResult(true);

        /*$leads = $Leads->paginateWithSearch();
        $visualize = 0;
        $edit = 0;
        $delete = 0;*/
        
        return view('leads.index', compact('structureResult'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
