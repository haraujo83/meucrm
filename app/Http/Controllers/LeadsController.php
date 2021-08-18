<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Format;
use App\Helpers\StructureResult;

use App\Models\Lead;
use App\Models\AuxList;

class LeadsController extends Controller
{
    public function listResult($structure = false) {
        $data = app('request')->All();
        
        // Naturezas
        $leads  = new Lead;
        $leads = $leads->paginateWithSearch();

        // Elabora a estrutura do resultado
        $resultStructure = [
          'columns' => [
            [
              'name' => 'Nome',
              'field' => 'first_name',
              'width' => '100px',
              'align' => 'left'
            ],
            [
              'name' => 'Sobrenome',
              'field' => 'last_name',
              'width' => '100px',
              'align' => 'left'
            ],
            [
              'name' => 'Telefone',
              'field' => 'phone_mobile',
              'width' => '100px',
              'align' => 'left'
            ],
            [
              'name' => 'Data de Criação',
              'field' => 'date_entered',
              'width' => '100px',
              'align' => 'left'
            ]
          ],
          'actions' => [
            [
              'class' => 'btn btn-info btn-alterar',
              'title' => 'Alterar',
              'icon' => 'fa fa-edit',
              'href' => '/edit/{id}'
            ],
            [
              'class' => 'btn btn-danger btn-excluir',
              'title' => 'Excluir',
              'icon' => 'fa fa-trash',
              'href' => '/$module/destroy/{id}',
              'form' => [
                'method' => 'POST',
                'data-confirm' => 'Tem certeza que deseja excluir?'
              ],
            ]
          ],
          'data' => $leads,
          'filters' => array_filter($data),
        ];
    
        return $structure ? $resultStructure : $leads;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuxList $AuxList)
    {
        $resultStructure = $this->listResult(true);

        /*$leads = $Leads::paginate(20);

        foreach($leads as $lead){
            $lead->date_entered = Format::legibleDate($lead->date_entered, false);
        }*/

        $statusLeadList = $AuxList::getAuxList('status_lead_list');
        $ratingList = $AuxList::getAuxList('rating_list');
        $leadSourceDom = $AuxList::getAuxList('lead_source_dom');
        $statusImovelList = $AuxList::getAuxList('status_imovel_list');
        $temImovelList = $AuxList::getAuxList('tem_imovel_list');

        /*$visualize = 0;
        $edit = 0;
        $delete = 0;*/

        return view('leads.index', compact('resultStructure', 'statusLeadList', 'ratingList', 'leadSourceDom', 'statusImovelList', 'temImovelList'));
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
