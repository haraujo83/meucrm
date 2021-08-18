@extends('template')

@section('content')
<div class="content">
    <div class="row p-2">
        <div class="col-12">
            <a href="#" class="btn btn-primary float-right" title="Criar Lead" data-tippy><i class="fas fa-plus-circle"></i> Criar</a>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary2">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-search"></i> Buscar</h3>
                    <div class="card-tools">
                        {{ Form::button('<i class="fas fa-minus"></i>', ['class' => 'btn btn-tool', 'data-card-widget' => 'collapse', 'title' => 'Minimizar/Maximizar', 'data-tippy' => '']) }}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{ Form::open(['method' => 'GET', 'class' => 'form-search']) }}
                        {{ Form::hidden('pagination', 20) }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[nome]', 'Nome:') }}
                                    {{ Form::text('filtrar[nome]', null, ['class' => 'form-control form-control-sm']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[cpf]', 'CPF:') }}
                                    {{ Form::text('filtrar[cpf]', null, ['class' => 'form-control form-control-sm', 'data-mask' => 'cpf']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[telefone]', 'Telefone:') }}
                                    {{ Form::text('filtrar[telefone]', null, ['class' => 'form-control form-control-sm', 'data-mask' => 'telefone']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[email]', 'E-mail:') }}
                                    {{ Form::email('filtrar[email]', null, ['class' => 'form-control form-control-sm']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[produto]', 'Produto:') }}
                                    {{ Form::select('filtrar[produto]', [1, 2, 3], null, ['class' => 'form-control form-control-sm data-select2', 'id' => 'filtrar-produto']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[status]', 'Status:') }}
                                    {{ Form::select('status', [$statusLeadList], null, ['class' => 'form-control form-control-sm data-select2', 'id' => 'filtrar-status']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[atribuido_a]', 'Atribuído a:') }}
                                    {{ Form::select('filtrar[atribuido_a]', [], null, ['class' => 'form-control form-control-sm data-select2', 'id' => 'filtrar-atribuido_a']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[rating]', 'Rating:') }}
                                    {{ Form::select('filtrar[rating]', [], null, ['class' => 'form-control form-control-sm data-select2', 'id' => 'filtrar-rating']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[conta]', 'Conta:') }}
                                    {{ Form::text('filtrar[conta]', null, ['class' => 'form-control form-control-sm']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[fonte]', 'Fonte do Lead:') }}
                                    {{ Form::select('filtrar[fonte]', [], null, ['class' => 'form-control form-control-sm data-select2', 'id' => 'filtrar-fonte']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[status_imovel]', 'Status do Imóvel:') }}
                                    {{ Form::select('filtrar[status_imovel]', [], null, ['class' => 'form-control form-control-sm data-select2', 'id' => 'filtrar-status_movel']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[tem_imovel]', 'Tem Imóvel:') }}
                                    {{ Form::select('filtrar[tem_imovel]', [], null, ['class' => 'form-control form-control-sm data-select2', 'id' => 'filtrar-tem_imovel']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('filtrar[periodo_criacao]', 'Período de Criação:') }}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        {{ Form::text('filtrar[periodo_criacao]', null, ['class' => 'form-control form-control-sm float-right', 'data-date_range' => '']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            {{ Form::submit('Buscar', ['class' => 'btn btn-primary btn-sm']) }}
                        </div>
                        <!--/.row -->
                    {{ Form::close() }}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    @include('result', ['resultData' => $resultStructure])
</div>
@endsection