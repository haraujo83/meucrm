<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

use App\Helpers\Format;
use App\Helpers\StructureResult;

use App\Http\Requests\LeadsSearchRequest;
use App\Http\Requests\LeadsCreateOrEditRequest;

use App\Models\Product;
use App\Models\User;
use App\Models\Field;
use App\Models\Action;
use App\Models\Lead;
use App\Models\AuxList;

/**
 *
 */
class LeadsController extends Controller
{
    /**
     * @var string
     */
    protected string $module = 'leads';

    /**
     * @param LeadsSearchRequest $request
     * @return View
     */
    public function result(LeadsSearchRequest $request): View
    {
        $resultStructure = $this->listResult($this->module, true);
        $viewData = compact(
            'resultStructure'
        );

        return view($this->module.'.result', $viewData);
    }

    /**
     * @param $module
     * @param false $structure
     * @return array
     */
    public function listResult($module, bool $structure = false): array
    {
        $where = [];

        $filters = app('request')->All();

        unset($filters['pagination'], $filters['_order'], $filters['_direction'], $filters['page'], $filters['module'], $filters['hostname']);

        foreach ($filters as $key => $val) {
            if (isset($val)) {
                if (substr_count($key, 'periodo') > 0) {
                    $datePeriod = explode('-', $val);
                    if ($key === 'periodo_criacao') {
                        $key = 'date_entered';
                    }

                    $dateStart = trim($datePeriod[0]);
                    $dateEnd = trim($datePeriod[1]);

                    //date start
                    $where[$key][] = ['>=', Format::bankDate($dateStart)];

                    //date end
                    $where[$key][] = ['<=', Format::bankDate($dateEnd)];
                } elseif ($key === 'first_name') {
                    $where[$key][] = ['LIKE', '%'.$val.'%'];
                } else {
                    $where[$key][] = ['=', $val];
                }
            }
        }

        // Naturezas
        $leads  = new Lead();
        $leads = $leads->paginateWithSearch([
            /*'accounts' => [
				'foreign_id' => 'accounts.id',
				'group' => 'leads.account_id',
				'fields' => [
					'name'
					/*'reserva', 'draft_deadline',
					'vgm_deadline', 'carga_deadline'*/
				/*],
			],
			/*'aux_list' => [
				'foreign_id' => [
					'table' => 'leads',
					'column' => 'processo_exportacao_id'
				],
				'group' => 'expor_processos.id',
				'fields' => [
					'registro_numero',
				]
			]*/
        ], $where);

        $fields = new Field();
        $actions = new Action();
        //faltou mandar o id e o user
        //$id = $leads->idnum;
        $id = '1';

        $fieldsColumns = $fields->returnFieldsResult($module);
        $actionsColumns = $actions->returnActionsResult($module, $id, true, true, true);

        $resultStructure = StructureResult::resultStructure($fieldsColumns, $actionsColumns, $leads, $filters);

        foreach($resultStructure['data'] as $result)
        {
            foreach($fieldsColumns as $field)
            {
                //date
                if($field['type'] == 'date' || $field['type'] == 'datetime')
                {
                    if($result[$field['field']] != '0000-00-00')
                    {
                        $field['type'] == 'date' ? $hideTime = true : $hideTime = false;
                        $result[$field['field']] = Format::legibleDate($result[$field['field']], $hideTime);
                    }else
                    {
                        $result[$field['field']] = '';
                    }
                }
                //decimal
                //
                //
                
            }
        }

        return $structure ? $resultStructure : $leads;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $product = new Product();
        $user = new User();
        $auxList = new AuxList();

        $usersList = $user->getUserList();
        $productList = $product->getProductList();
        $statusLeadList = $auxList::getAuxList('status_lead_list');
        $ratingList = $auxList::getAuxList('rating_list');
        $leadSourceDom = $auxList::getAuxList('lead_source_dom');
        $statusImovelList = $auxList::getAuxList('status_imovel_list');
        $temImovelList = $auxList::getAuxList('tem_imovel_list');

        $module = $this->module;

        $viewData = compact(
            'statusLeadList',
            'ratingList',
            'leadSourceDom',
            'statusImovelList',
            'temImovelList',
            'productList',
            'usersList',
            'module'
        );

        return view($module.'.index', $viewData);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $module = $this->module;

        $product = new Product();
        $auxList = new AuxList();

        $productList = $product->getProductList('-- Selecione --');
        $statusLeadList = $auxList::getAuxList('status_lead_list', '-- Selecione --');
        $sexoList = $auxList::getAuxList('contact_sexo_list', '-- Selecione --');
        $tipoImovelList = $auxList::getAuxList('tipo_imovel_list', '-- Selecione --');
        $temImovelList = $auxList::getAuxList('tem_imovel_list', '-- Selecione --');

        $viewData = compact('module', 'productList', 'statusLeadList', 'sexoList', 'tipoImovelList', 'temImovelList');

        return view($module.'.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(LeadsCreateOrEditRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
