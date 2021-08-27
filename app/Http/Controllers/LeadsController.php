<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

use App\Helpers\Format;
use App\Helpers\StructureResult;

use App\Http\Requests\LeadsSearchRequest;
use App\Traits\TraitMessage;

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
    public function result(LeadsSearchRequest $request): View
    {
        $module = 'leads';
        $resultStructure = $this->listResult($module, true);
        $viewData = compact(
            'resultStructure'
        );

        return view($module.'.result', $viewData);
    }

    public function listResult($module, $structure = false): array
    {   
        $where = [];

        $filters = app('request')->All();

        unset($filters['pagination'], $filters['_order'], $filters['_direction'], $filters['page'], $filters['module'], $filters['hostname']);

        foreach($filters as $key => $val)
        {
            if(isset($val))
            {
                if(substr_count($key, 'periodo') > 0)
                {
                    $datePeriod = explode('-', $val);
                    if($key == 'periodo_criacao'){
                        $key = 'date_entered';
                    }

                    $dateStart = trim($datePeriod[0]);
                    $dateEnd = trim($datePeriod[1]);

                    //date start
                    $where[$key][] = ['>=', Format::bankDate($dateStart)];

                    //date end
                    $where[$key][] = ['<=', Format::bankDate($dateEnd)];
                }
                else
                {
                    if($key == 'first_name')
                    {
                        $where[$key][] = ['LIKE', '%'.$val.'%'];
                    }
                    else
                    {
                        $where[$key][] = ['=', $val];
                    }
                }
            }
        }
<<<<<<< HEAD
        
=======

        $module = 'leads';

>>>>>>> a6374c455ce80bc853f95aec48b4edfe6ab327d4
        // Naturezas
        $leads  = new Lead;
        $leads = $leads->paginateWithSearch([], $where);

        $fields = new Field;
        $actions = new Action;
        //faltou mandar o id e o user
        //$id = $leads->idnum;
        $id = '1';

        $fieldsColumns = $fields->returnFieldsResult($module);
        $actionsColumns = $actions->returnActionsResult($module, $id, true, true, true);

        $resultStructure = StructureResult::resultStructure($fieldsColumns, $actionsColumns, $leads, $filters);

        return $structure ? $resultStructure : $leads;
    }

    /**
     * Display a listing of the resource.
     *
     * @param AuxList $AuxList
     * @return View
     */
    public function index(AuxList $AuxList): View
    {
        $module = 'leads';
        $product = new Product();
        $user = new User();

        $usersList = $user->getUserList();
        $productList = $product->getProductList();
        $statusLeadList = $AuxList::getAuxList('status_lead_list');
        $ratingList = $AuxList::getAuxList('rating_list');
        $leadSourceDom = $AuxList::getAuxList('lead_source_dom');
        $statusImovelList = $AuxList::getAuxList('status_imovel_list');
        $temImovelList = $AuxList::getAuxList('tem_imovel_list');

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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
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
