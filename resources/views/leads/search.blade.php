{{ Form::open(['method' => 'GET', 'class' => 'form-search']) }}
    {{ Form::hidden('pagination', 20) }}
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('nome', 'Nome:') }}
                {{ Form::text('nome', null, ['class' => 'form-control form-control-sm']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('cpf', 'CPF:') }}
                {{ Form::text('cpf', null, ['class' => 'form-control form-control-sm', 'data-mask' => 'cpf']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('telefone', 'Telefone:') }}
                {{ Form::text('telefone', null, ['class' => 'form-control form-control-sm', 'data-mask' => 'telefone']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('email', 'E-mail:') }}
                {{ Form::email('email', null, ['class' => 'form-control form-control-sm']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('produto', 'Produto:') }}
                {{ Form::select('produto', $productList, null, ['class' => 'form-control form-control-sm data-select2']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('status', 'Status:') }}
                {{ Form::select('status', $statusLeadList, null, ['class' => 'form-control form-control-sm data-select2']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('atribuido_a', 'Atribuído a:') }}
                {{ Form::select('atribuido_a', $usersList, null, ['class' => 'form-control form-control-sm data-select2']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('rating', 'Rating:') }}
                {{ Form::select('rating', $ratingList, null, ['class' => 'form-control form-control-sm data-select2']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('account', 'Conta:') }}
                {{ Form::select('account', [], null, ['class' => 'form-control form-control-sm data-select2', 'data-placeholder' => 'Digite o nome da conta...']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('fonte', 'Fonte do Lead:') }}
                {{ Form::select('fonte', $leadSourceDom, null, ['class' => 'form-control form-control-sm data-select2']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('status_imovel', 'Status do Imóvel:') }}
                {{ Form::select('status_imovel', $statusImovelList, null, ['class' => 'form-control form-control-sm data-select2']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('tem_imovel', 'Tem Imóvel:') }}
                {{ Form::select('tem_imovel', $temImovelList, null, ['class' => 'form-control form-control-sm data-select2']) }}
            </div>
        </div>
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


    <!--/.row -->
    <div class="row">
        <div class="col-md-12">
            {{ Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    <!--/.row -->
{{ Form::close() }}
