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
                    {{ Form::open(['method' => 'GET']) }}
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
                                    {{ Form::label('conta', 'Conta:') }}
                                    {{ Form::select('conta', $accountList, null, ['class' => 'form-control form-control-sm data-select2']) }}
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

    @if ($leads)
        <div class="card p-0">
            <!-- /.card-header -->
            <div class="card-body">
                @include('filter-result', ['items' => $leads])
                <div class="result-search">
                    <table class="table table-sm table-striped table-with-actions">
                        <thead>
                            <tr>
                                <th>
                                    @include('link-table-order', ['title' => 'Nome', 'field' => 'name_first'])
                                </th>
                                <th>
                                    @include('link-table-order', ['title' => 'Telefone', 'field' => 'phone_mobile'])
                                </th>
                                <th>
                                    @include('link-table-order', ['title' => 'Data de Criação', 'field' => 'email'])
                                </th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                    <td>{{ $lead->phone_mobile }}</td>
                                    <td>{{ $lead->date_entered }}</td>
                                    <td class="buttons">
                                        <a href="/lead/edit/{{ $lead->id }}?redirect=on" class="btn btn-info" title="Alterar">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Excluir">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($leads->isEmpty())
                                <tr>
                                    <td colspan="99" class="text-center">
                                        <em>Nenhum registro encontrado.</em>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="result-filter2">
                    @include('filter-result', ['items' => $leads])
                </div>
            </div>
            {{ $leads->links() }}
        </div>
    @endif
    <!-- /.row -->
</div>
@endsection
