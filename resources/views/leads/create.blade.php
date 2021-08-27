@extends('template')

@section('content')
{{ Form::open(['method' => 'GET', 'class' => 'form-store', 'route' => 'leads.store']) }}
    {{ Form::hidden('module', $module) }}
    <div class="card card-secondary2">
        <div class="card-body">
            <div class="row">
                {{ Form::bsCpf('cpf', 'CPF:', null, ['div_col_n' => 6]) }}

                <div class="col-md-6">

                </div>

                {{ Form::bsText('first_name', 'Primeiro Nome:', null, ['div_col_n' => 6]) }}

                {{ Form::bsText('last_name', 'Sobrenome:', null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('sexo', 'Sexo:', null, $sexoList, ['div_col_n' => 6]) }}

                {{ Form::bsDate('date_birth', 'Data de Nascimento:', null, ['div_col_n' => 6]) }}

                {{ Form::bsPhone('phone_mobile', 'Celular:', null, ['div_col_n' => 6]) }}

                {{ Form::bsPhone('telefone_contato', 'Telefone:', null, ['div_col_n' => 6]) }}

                {{ Form::bsEmail('email', 'E-mail:', null, ['div_col_n' => 6]) }}

                <div class="col-md-6">
                </div>

                {{ Form::bsSelect2('account_id', 'Conta:', null, [], ['data-placeholder' => 'Digite o nome da conta...', 'div_col_n' => 6]) }}

                {{ Form::bsSelect2('status', 'Status:', null, $statusLeadList, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('parent_type', 'Produto:', null, $productList, ['div_col_n' => 6]) }}
            </div>
            <!--/.row-->
            <fieldset data-parent_type="1" class="row" style="display: none;"  >
                <legend>Financiamento</legend>

                {{ Form::bsSelect2('tipo_imovel', 'Tipo de Imóvel:', null, [], ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('tem_imovel', 'Tem Imóvel:', null, [], ['div_col_n' => 6]) }}

                {{ Form::bsMoney('valor', 'Valor do Imóvel:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('financiamento', 'Financiamento:', null, ['div_col_n' => 6]) }}

                {{ Form::bsNumber('prazo', 'Prazo:', null, ['div_col_n' => 6]) }}

                {{ Form::bsPercent('taxa_juros', 'Taxa de Juros:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('primeira_parcela', 'Primeira Parcela:', null, ['div_col_n' => 6]) }}

                {{ Form::bsMoney('ultima_parcela', 'Última Parcela:', null, ['div_col_n' => 6]) }}

                {{ Form::bsSelect2('empreendimento', 'Empreendimento:', null, [], ['data-placeholder' => 'Digite o nome do empreendimento...', 'div_col_n' => 6]) }}
            </fieldset>
            <fieldset data-parent_type="2" class="row" style="display: none;">
                <legend>Home Equity</legend>
            </fieldset>
            <fieldset data-parent_type="3" class="row" style="display: none;">
                <legend>Consórcio</legend>
            </fieldset>
            <!--/.row-->
        </div>
        <!--/.card-body-->
        <div class="card-footer text-center">
            {{ Form::bsBtnStore() }}
            {{ Form::bsBtnCancel() }}
        </div>
    </div>
    <!--/.card-->
{{ Form::close() }}
@endsection
