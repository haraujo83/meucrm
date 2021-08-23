@extends('template')

@section('content')
<div class="content">
    <div class="row p-2">
        <div class="col-12">
            <a href="#" class="btn btn-primary float-right" data-tippy-content="Criar novo Lead"><i class="fas fa-plus"></i> Novo Lead</a>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary2">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-search"></i> Buscar</h3>
                    <div class="card-tools">
                        {{ Form::button('<i class="fas fa-minus"></i>', ['class' => 'btn btn-tool', 'data-card-widget' => 'collapse', 'data-tippy-content' => 'Minimizar/Maximizar']) }}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{ Form::open(['method' => 'GET', 'class' => 'form-search']) }}
                        {{ Form::hidden('pagination', 20) }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    {{ Form::text('first_name', isset($filters['first_name']) ? $filters['first_name'] : '', ['class' => 'form-control form-control-sm']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CPF</label>
                                    {{ Form::text('cpf', isset($filters['cpf']) ? $filters['cpf'] : '', ['class' => 'form-control form-control-sm', 'data-mask' => 'cpf']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    {{ Form::text('telefone_contato', isset($filters['telefone_contato']) ? $filters['telefone_contato'] : '', ['class' => 'form-control form-control-sm', 'data-mask' => 'telefone']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    {{ Form::email('email', isset($filters['email']) ? $filters['email'] : '', ['class' => 'form-control form-control-sm']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Produto:</label>
                                    {{ Form::select('parent_type', $productList, isset($filters['parent_type']) ? $filters['parent_type'] : '', ['class' => 'form-control form-control-sm data-select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status:</label>
                                    {{ Form::select('status', $statusLeadList, isset($filters['status']) ? $filters['status'] : '', ['class' => 'form-control form-control-sm data-select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Atribuído a:</label>
                                    {{ Form::select('atribuido_a', $usersList, isset($filters['atribuido_a']) ?  $filters['atribuido_a'] : '', ['class' => 'form-control form-control-sm data-select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Rating:</label>
                                    {{ Form::select('rating', $ratingList, isset($filters['rating']) ? $filters['rating'] : '', ['class' => 'form-control form-control-sm data-select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Conta:</label>
                                    {{ Form::select('account_id', $accountList, isset($filters['account_id']) ? $filters['account_id'] : '', ['class' => 'form-control form-control-sm data-select2', 'data-placeholder' => 'Digite o nome da conta...']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fonte do Lead:</label>
                                    {{ Form::select('lead_source', $leadSourceDom, isset($filters['lead_source']) ? $filters['lead_source'] : '', ['class' => 'form-control form-control-sm data-select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status do Imóvel:</label>
                                    {{ Form::select('status_imovel', $statusImovelList, isset($filters['status_imovel']) ? $filters['status_imovel'] : '', ['class' => 'form-control form-control-sm data-select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tem Imóvel:</label>
                                    {{ Form::select('tem_imovel', $temImovelList, isset($filters['tem_imovel']) ? $filters['tem_imovel'] : '', ['class' => 'form-control form-control-sm data-select2']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Período de Criação:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        {{ Form::text('periodo_criacao', isset($filters['periodo_criacao']) ? $filters['periodo_criacao'] : '', ['class' => 'form-control form-control-sm float-right', 'data-date_range' => '']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::submit('Buscar', ['id'=> 'search', 'class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        <!--/.row -->
                    {{ Form::close() }}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="result-index">
        <!-- /.row -->
        @include('result', ['resultData' => $resultStructure])
    </div>
</div>
@endsection
