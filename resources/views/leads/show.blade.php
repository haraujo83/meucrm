@extends('template')

@section('content')

<div class="row p-2">
    <div class="col-12 text-right">
        <a href="{{$actionEdit['href']}}" class="{{ $actionEdit['class'] }} btn-xs" data-tippy title="{{ $actionEdit['title'] }}"><i class="{{ $actionEdit['icon'] }}"></i> {{  $actionEdit['title'] }}</a>
        <a href="{{$actionDelete['href']}}" class="{{ $actionDelete['class'] }} btn-xs" data-tippy title="{{ $actionDelete['title'] }}"><i class="{{ $actionDelete['icon'] }}"></i> {{ $actionDelete['title'] }}</a>
        {{--<a href="{{route($module.'.create')}}" class="btn btn-primary btn-xs" data-tippy title="{{ $titleButtonCreate }}"><i class="fas fa-plus"></i> {{ $titleButtonCreate }}</a>--}}
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-secondary2 card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{$lead->name()}}</h3>

                @if($emailAddress->email_address)
                <a href="mailto:{{ $emailAddress->email_address }}"><i class="fas fa-envelope"></i> {{$emailAddress->email_address}}</a><br />
                @endif
                @if($lead->phone_mobile)
                <a href="tel:{{$lead->phone_mobile}}"><i class="fas fa-phone"></i> {{$lead->phone_mobile}}</a><br />
                @endif
                @if($lead->telefone_contato)
                <a href="tel:{{$lead->telefone_contato}}"><i class="fas fa-phone"></i> {{$lead->telefone_contato}}</a>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card card-secondary2">
            <div class="card-body">
                <strong>Conta:</strong> <span class="text-muted"><a href="{{route('accounts.show', [$account->id])}}">{{$account->name}}</a></span><br />
                <strong>Oportunidade:</strong> <span class="text-muted"><a href="{{route('opportunities.show', [0])}}">Allan Editando Teste Automatizado</a></span><br />
                <strong>Rating:</strong> <span class="text-muted">@if ($rating) {{$rating->description}} @endif</span><br />
                <br />
                <strong>Consultor:</strong> <span class="text-muted">{{$assignedUser->name()}}</span><br />
                <strong>Gerente:</strong> <span class="text-muted">{{$reportsTo->name()}}</span><br />
                <strong>Superintendente:</strong> <span class="text-muted">{{$superintendent->name()}}</span>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#informacoes" data-toggle="tab">Informações</a></li>
                    <li class="nav-item"><a class="nav-link" href="#produto" data-toggle="tab">Dados do Produto</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Linha do Tempo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#produtos" data-toggle="tab">Produtos</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="informacoes">
                        <p>
                            <strong>Nome:</strong> {{$lead->name()}}<br />
                            <strong>CPF:</strong> {{$lead->cpf}}<br />
                            <strong>Sexo:</strong> @if ($sexo){{$sexo->description}}@endif<br />
                            <strong>Data de Nascimento:</strong> {{\App\Helpers\Format::legibleDate($lead->birthdate)}}
                        </p>
                        <p>
                            <strong>Status:</strong> @if ($status) {{$status->description}} @endif
                        </p>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="produto">
                        <p>
                            <strong>Valor do Imóvel:</strong> {{\App\Helpers\Format::money($leadFinanciamento->valor_imovel)}}<br />
                            <strong>Financiamento:</strong> {{\App\Helpers\Format::money($leadFinanciamento->valor_financiamento)}}<br />
                            <strong>Tipo Imóvel:</strong> {{$tipoImovel->description}}<br />
                            <strong>Primeira Parcela:</strong> {{\App\Helpers\Format::money($leadFinanciamento->parcela_primeira)}}<br />
                            <strong>Última Parcela:</strong> {{\App\Helpers\Format::money($leadFinanciamento->parcela_ultima)}}<br />
                            <strong>Prazo:</strong> {{$leadFinanciamento->prazo}}<br />
                            <strong>Taxa de Juros:</strong> {{\App\Helpers\Format::decimalVirgula($leadFinanciamento->taxa_juros)}}%<br />
                            <strong>Tem Imóvel:</strong> @if ($temImovel) {{$temImovel->description}} @endif
                            @if ($empreendimento)
                            <br />
                            <strong>Empreendimento:</strong> {{$empreendimento->name}}
                            @endif
                        </p>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane timeline" id="timeline">
                        <div>
                            <i class="fas fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> 01/09/2021 às 11:09</span>
                                <h3 class="timeline-header">Contato com Cliente</h3>

                                <div class="timeline-body">
                                    descricao
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-xs">Editar</a>
                                    <a class="btn btn-danger btn-xs">Excluir</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <i class="fas fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> 01/09/2021 às 11:09</span>
                                <h3 class="timeline-header">Contato com Cliente</h3>

                                <div class="timeline-body">
                                    descricao
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-sm">Editar</a>
                                    <a class="btn btn-danger btn-sm">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="produtos">
                        <table class="table table-condensed table-hover table-bordered table-striped p-0 m-0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Fase</th>
                                    <th>Conta</th>
                                    <th>Produto</th>
                                    <th>Criado Em</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bruno Nascimento</td>
                                    <td>Em andamento</td>
                                    <td>Conta ABC</td>
                                    <td>Financiamento</td>
                                    <td>01/10/2020 19:24:07</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nascimento</td>
                                    <td>Finalizado</td>
                                    <td>Conta ABC</td>
                                    <td>Financiamento</td>
                                    <td>01/10/2020 19:24:07</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection
