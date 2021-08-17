<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\Format;

use App\Models\Lead;
use App\Models\AuxList;
use Illuminate\Http\Response;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Lead $Leads
     * @param AuxList $AuxList
     * @param Account $account
     * @return Response
     */
    public function index(Lead $Leads, AuxList $AuxList, Account $account, Product $product)
    {
        $leads = $Leads::paginate(20);

        foreach($leads as $lead){
            $lead->date_entered = Format::legibleDate($lead->date_entered, false);
        }

        $accountList = [];//$account->getList();
        $productList = $product->getList();
        $statusLeadList = $AuxList::getAuxList('status_lead_list');
        $ratingList = $AuxList::getAuxList('rating_list');
        $leadSourceDom = $AuxList::getAuxList('lead_source_dom');
        $statusImovelList = $AuxList::getAuxList('status_imovel_list');
        $temImovelList = $AuxList::getAuxList('tem_imovel_list');

        $visualize = 0;
        $edit = 0;
        $delete = 0;

        $viewData = compact(
            'leads', 'statusLeadList', 'ratingList',
            'leadSourceDom', 'statusImovelList', 'temImovelList',
            'accountList', 'productList',
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
