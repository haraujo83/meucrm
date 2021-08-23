{{ Form::open(['method' => 'GET', 'class' => 'form-search']) }}
    {{ Form::hidden('pagination', 20) }}
    <div class="row">
        {{ Form::bsText('nome', 'Nome:') }}

        {{ Form::bsText('cpf', 'CPF:', [], ['data-mask' => 'cpf']) }}

        {{ Form::bsText('telefone', 'Telefone:', [], ['data-mask' => 'telefone']) }}

        {{ Form::bsEmail('email', 'E-mail:') }}

        {{ Form::bsSelect2('produto', 'Produto:', $productList) }}

        {{ Form::bsSelect2('status', 'Status:', $statusLeadList) }}

        {{ Form::bsSelect2('atribuido_a', 'Atribuído a:', $usersList) }}

        {{ Form::bsSelect2('rating', 'Rating:', $ratingList) }}

        {{ Form::bsSelect2('account', 'Conta:', [], [], ['data-placeholder' => 'Digite o nome da conta...']) }}

        {{ Form::bsSelect2('fonte', 'Fonte do Lead:', $leadSourceDom) }}

        {{ Form::bsSelect2('status_imovel', 'Status do Imóvel:', $statusImovelList) }}

        {{ Form::bsSelect2('tem_imovel', 'Tem Imóvel:', $temImovelList) }}

        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('periodo_criacao', 'Período de Criação:') }}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    {{ Form::text('periodo_criacao', null, ['class' => 'form-control form-control-sm float-right', 'data-date_range' => '']) }}
                </div>
            </div>
        </div>
    </div>
    <!--/.row -->
    <div class="row mb-1">
        <div class="col-md-2">
            {{ Form::button('<i class="fas fa-columns"></i> Selecionar Colunas', ['class' => 'btn btn-default btn-xs', 'data-tippy-content' => 'Selecionar colunas a serem exibidas no Resultado', 'data-module' => 'leads', 'id' => 'select-result-cols']) }}
        </div>
    </div>
    <!--/.row -->
    <div class="row">
        <div class="col-md-12">
            {{ Form::button('Buscar', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
        </div>
    </div>
    <!--/.row -->
{{ Form::close() }}
