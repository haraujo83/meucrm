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
                {{ Form::bsCpf('cpf', 'CPF:', null, ['div_col_n' => 6]) }}

                {{ Form::bsDate('date_birth', 'Data de Nascimento:', null, ['div_col_n' => 6]) }}

                {{ Form::bsText('first_name', 'Primeiro Nome:', null, ['div_col_n' => 6]) }}

                {{ Form::bsText('last_name', 'Sobrenome:', null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('sexo', 'Sexo:', null, $sexoList, ['div_col_n' => 6]) }}
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
                {{ Form::bsPhone('phone_mobile', 'Celular:', null, ['div_col_n' => 6]) }}

                {{ Form::bsPhone('telefone_contato', 'Telefone:', null, ['div_col_n' => 6]) }}

                {{ Form::bsEmail('email', 'E-mail:', null, ['div_col_n' => 6]) }}
            </div>
        </div>
    </div>

    <div class="card card-secondary2">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => 'Dados do Lead'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsSelect2('account_id', 'Conta:', null, [], ['data-placeholder' => 'Digite o nome da conta...', 'data-list_account', 'div_col_n' => 6]) }}

                {{ Form::bsSelect2('status', 'Status:', null, $statusLeadList, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('parent_type', 'Produto:', null, $productList, ['div_col_n' => 6]) }}
            </div>
        </div>
    </div>

    <div class="card card-secondary2" data-parent_type="1" style="display: none;">
        <div class="card-header">
            @include('components.card-title', ['cardTitle' => 'Financiamento'])
            <div class="card-tools">
                @include('components.btn-collapse')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ Form::bsSelect2('tipo_imovel', 'Tipo de Imóvel:', null, $tipoImovelList, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('tem_imovel', 'Tem Imóvel:', null, $temImovelList, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('valor', 'Valor do Imóvel:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('financiamento', 'Financiamento:', null, ['div_col_n' => 6]) }}

                {{ Form::bsNumber('prazo', 'Prazo:', null, ['div_col_n' => 6]) }}

                {{ Form::bsPercent('taxa_juros', 'Taxa de Juros:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('primeira_parcela', 'Primeira Parcela:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('ultima_parcela', 'Última Parcela:', null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('empreendimento', 'Empreendimento:', null, [], ['data-placeholder' => 'Digite o nome do empreendimento...', 'data-list_empreendimento', 'div_col_n' => 6]) }}
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
                {{ Form::bsSelect2('tipo_imovel', 'Tipo de Imóvel:', null, $tipoImovelList, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('valor', 'Valor do Imóvel:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('financiamento', 'Financiamento:', null, ['div_col_n' => 6]) }}

                {{ Form::bsNumber('prazo', 'Prazo:', null, ['div_col_n' => 6]) }}

                {{ Form::bsPercent('taxa_juros', 'Taxa de Juros:', null, ['div_col_n' => 6]) }}
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
                {{ Form::bsMoney('valor_credito', 'Valor do Crédito:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('primeira_parcela', 'Primeira Parcela:', null, ['div_col_n' => 6]) }}

                {{ Form::bsNumber('prazo', 'Prazo:', null, ['div_col_n' => 6]) }}
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
