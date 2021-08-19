<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Helpers\Format;
use App\Helpers\StructureResult;

use App\Models\Account;
use App\Models\Product;
use App\Models\User;
use App\Models\Field;
use App\Models\Action;
use App\Models\Lead;
use App\Models\AuxList;

class LeadsController extends Controller
{
    public function listResult($structure = false) 
    {
        $filters = app('request')->All();

        $module = 'leads';

        // Naturezas
        $leads  = new Lead;
        $leads = $leads->paginateWithSearch();

        $fields = new Field;
        $actions = new Action;

        $fieldsColumns = $fields->returnFieldsResult($module);
        $actionsColumns = $actions->returnActionsResult($module, true, true, true);

        $resultStructure = StructureResult::resultStructure($fieldsColumns, $actionsColumns, $leads, $filters);

        return $structure ? $resultStructure : $leads;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Lead $Leads
     * @param AuxList $AuxList
     * @return View
     */
    public function index(AuxList $AuxList)
    {
        $resultStructure = $this->listResult(true);

        /*$leads = $Leads::paginate(20);

        foreach($leads as $lead){
            $lead->date_entered = Format::legibleDate($lead->date_entered, false);
        }*/

        $account = new Account();
        $product = new Product();
        $user = new User();

        $accountList = [];//$account->getAccountList();
        $usersList = $user->getUserList();
        $productList = $product->getProductList();
        $statusLeadList = $AuxList::getAuxList('status_lead_list');
        $ratingList = $AuxList::getAuxList('rating_list');
        $leadSourceDom = $AuxList::getAuxList('lead_source_dom');
        $statusImovelList = $AuxList::getAuxList('status_imovel_list');
        $temImovelList = $AuxList::getAuxList('tem_imovel_list');

        /*$create = 0;*/

        $viewData = compact(
          'resultStructure', 'statusLeadList', 'ratingList',
          'leadSourceDom', 'statusImovelList', 'temImovelList',
          'accountList', 'productList', 'usersList',
        );

        return view('leads.index', $viewData);
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
