@extends('template')

@section('content')
{{ Form::open(['method' => 'GET', 'class' => 'form-store', 'route' => 'leads.store']) }}
    {{ Form::hidden('module', $module) }}
    <div class="card card-secondary2">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => '<i class="fas fa-user"></i> Dados Pessoais'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsText($fields['leads']['first_name'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsText($fields['leads']['last_name'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsCpf($fields['leads']['cpf'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsDate($fields['leads']['birthdate'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2($fields['leads']['sexo'], null, null, null, ['div_col_n' => 6, 'one']) }}
            </div>
            <!--/.row-->
        </div>
        <!--/.card-body-->
    </div>
    <!--/.card-->

    <div class="card card-secondary2">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => '<i class="fas fa-address-book"></i> Dados para Contato'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsPhone($fields['leads']['phone_mobile'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsPhone($fields['leads']['telefone_contato'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsEmail($fields['leads']['email'], null, null, ['div_col_n' => 6]) }}
            </div>
        </div>
    </div>
    <!--/.card-->

    <div class="card card-secondary2">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => 'Dados do Lead'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsSelect2($fields['leads']['account_id'], 'Conta:', null, [], ['data-placeholder' => 'Digite o nome da conta...', 'data-list_account', 'div_col_n' => 6, 'one']) }}

                {{ Form::bsSelect2($fields['leads']['status'], null, null, null, ['div_col_n' => 6, 'one']) }}

                {{ Form::bsSelect2($fields['leads']['parent_type'], null, null, $productList, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2($fields['leads']['lead_source'], null, null, null, ['div_col_n' => 6, 'one']) }}
            </div>
        </div>
    </div>
    <!--/.card-->

    <div class="card card-secondary2" data-parent_type="1" style="display: none;">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => 'Financiamento'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsSelect2($fields['leadsfinanciamento']['tipo_imovel_list'], null, null, null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2($fields['leadsfinanciamento']['tem_imovel_list'], null, null, null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2($fields['leadsfinanciamento']['rating'], null, null, null, ['div_col_n' => 6]) }}

                <div class="col-md-6"></div>

                {{ Form::bsMoney($fields['leadsfinanciamento']['valor_imovel'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney($fields['leadsfinanciamento']['valor_financiamento'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsNumber($fields['leadsfinanciamento']['prazo'],null, null, ['div_col_n' => 6]) }}

                {{ Form::bsPercent($fields['leadsfinanciamento']['taxa_juros'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney($fields['leadsfinanciamento']['parcela_primeira'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney($fields['leadsfinanciamento']['parcela_ultima'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2($fields['leadsfinanciamento']['empreendimento_id'], null, null, [], ['data-placeholder' => 'Digite o nome do empreendimento...', 'data-list_empreendimento', 'div_col_n' => 6]) }}
            </div>
            <!--/.row -->
        </div>
        <!--/.card-body-->
    </div>
    <!--/.card -->

    <div class="card card-secondary2" data-parent_type="2" style="display: none;">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => 'Home Equity'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsSelect2($fields['leadshomeequity']['tipo_imovel_list'], null, null, null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney($fields['leadshomeequity']['valor_imovel'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney($fields['leadshomeequity']['valor_financiamento'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsNumber($fields['leadshomeequity']['prazo'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsPercent($fields['leadshomeequity']['taxa_juros'], null, null, ['div_col_n' => 6]) }}
            </div>
            <!--/.row -->
        </div>
        <!--/.card-body-->
    </div>
    <!--/.card -->

    <div class="card card-secondary2" data-parent_type="3" style="display: none;">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => 'Consórcio'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsMoney($fields['leadsconsorcio']['amount'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney($fields['leadsconsorcio']['parcela'], null, null, ['div_col_n' => 6]) }}

                {{ Form::bsNumber($fields['leadsconsorcio']['prazo'], null, null, ['div_col_n' => 6]) }}
            </div>
            <!--/.row -->
        </div>
        <!--/.card-body-->
    </div>
    <!--/.card -->

    <div class="card card-secondary2">
        <div class="card-footer text-center">
            {{ Form::bsBtnStore() }}
            {{ Form::bsBtnCancel() }}
        </div>
    </div>
    <!--/.card -->
{{ Form::close() }}
@endsection
