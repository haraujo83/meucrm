@extends('template')

@section('content')

<div class="row p-2">
    <div class="col-12">
        <a href="#" class="btn btn-primary float-right" title="Criar Lead"><i class="fas fa-plus-circle"></i> Criar</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-search"></i> Buscar</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="form_leads_busca">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[nome]">Nome:</label>
                                <input class="form-control form-control-sm" type="text" id="filtrar[nome]" name="filtrar[nome]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[cpf]">CPF:</label>
                                <input class="form-control form-control-sm" data-mask="cpf" type="text" id="filtrar[cpf]" name="filtrar[cpf]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[produto_id]">Produto:</label>
                                <select class="form-control form-control-sm" data-select2 id="filtrar[produto_id]" name="filtrar[produto_id]">
                                    <option>-- Nenhum --</option>
                                    <option>Financiamento</option>
                                    <option>Consórcio</option>
                                    <option>Home Equity</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[status]">Status:</label>
                                <select class="form-control form-control-sm" data-select2 id="filtrar[status]" name="filtrar[status]" multiple size="6">
                                    <option value="New" selected="selected">Não trabalhado</option>
                                    <option value="In Process" selected="selected">Agendamento</option>
                                    <option value="Converted" selected="selected">Cliente Interessado (Convertido)</option>
                                    <option value="Dead" selected="selected">Finalizado sem sucesso</option>
                                    <option value="Recycled" selected="selected">Mailing</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[atribuido_a]">Atribuído a:</label>
                                <select class="form-control form-control-sm" data-select2 id="filtrar[atribuido_a]" name="filtrar[atribuido_a]" multiple size="6">
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[rating]">Rating:</label>
                                <select class="form-control form-control-sm" id="filtrar[rating]" name="filtrar[rating]" multiple size="6">
                                    <option>-- Nenhum --</option>
                                    <option>BA2</option>
                                    <option>B2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[conta]">Conta:</label>
                                <select class="form-control form-control-sm" id="filtrar[conta]" name="filtrar[conta]">
                                    <option>-- Nenhum --</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[empreendimento]">Empreendimento:</label>
                                <select class="form-control form-control-sm" id="filtrar[empreendimento]" name="filtrar[empreendimento]">
                                    <option>-- Nenhum --</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[fonte]">Fonte do Lead:</label>
                                <select class="form-control form-control-sm" id="filtrar[fonte]" name="filtrar[fonte]">
                                    <option>-- Nenhum --</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[status_imovel]">Status do Imóvel:</label>
                                <select class="form-control form-control-sm" id="filtrar[status_imovel]" name="filtrar[status_imovel]">
                                    <option>-- Nenhum --</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[tem_imovel]">Tem Imóvel:</label>
                                <select class="form-control form-control-sm" id="filtrar[tem_imovel]" name="filtrar[tem_imovel]">
                                    <option>-- Nenhum --</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="filtrar[periodo_criacao]">Período de Criação:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm float-right" data-date_range id="filtrar[periodo_criacao]">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Resultado</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            {{--<th>Conta</th>--}}
                            <th>Telefone</th>
                            {{--<th>E-mail</th>
                            <th>Status</th>
                            <th>Responsável</th>
                            <th>Produto</th>--}}
                            <th>Data de Criação</th>
                            {{--<th>Fonte</th>--}}
                            <th style="width: 125px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $arr = [
                                [
                                    'id' => 1,
                                    'nome' => 'allan teste 1',
                                    'conta' => 'conta',
                                    'telefone' => '(11) 123456789',
                                    'email' => 'asbcc@teste.teste.com.br',
                                    'status' => 'não trabalhado',
                                    'responsavel' => 'adriano consultor',
                                    'produto' => 'Financiamento',
                                    'data_criacao' => '01/02/2021',
                                    'lead_source' => 'Assessoria',
                                ],
                                [
                                    'id' => 2,
                                    'nome' => 'allan teste 2',
                                    'conta' => 'conta b',
                                    'telefone' => '(11) 987654321',
                                    'email' => 'cccc@teste.teste.com.br',
                                    'status' => 'não trabalhado',
                                    'responsavel' => 'adriano consultor',
                                    'produto' => 'Financiamento',
                                    'data_criacao' => '02/02/2021',
                                    'lead_source' => 'Assessoria',
                                ],
                                [
                                    'id' => 3,
                                    'nome' => 'allan teste 3',
                                    'conta' => 'conta c',
                                    'telefone' => '(11) 555666777',
                                    'email' => 'bbbb@teste.teste.com.br',
                                    'status' => 'não trabalhado',
                                    'responsavel' => 'adriano consultor',
                                    'produto' => 'Financiamento',
                                    'data_criacao' => '03/02/2021',
                                    'lead_source' => 'Assessoria',
                                ],
                            ];

                        foreach ($arr as $a) {
                        ?>
                        <tr>
                            <td><a href="#" title="Ver Lead"><?php echo $a['nome']?></a></td>
                            {{--<td><a href="#" title="Ver Conta"><?php echo $a['conta']?></a></td>--}}
                            <td><?php echo $a['telefone']?></td>
                            {{--<td><a href="mailto:<?php echo $a['email']?>"><?php echo $a['email']?></a></td>
                            <td><span class="badge badge-success"><?php echo $a['status']?></span></td>
                            <td><a href="#" title="Ver Responsável"><?php echo $a['responsavel']?></a></td>
                            <td><?php echo $a['produto']?></td>--}}
                            <td><?php echo $a['data_criacao']?></td>
                            {{--<td><?php echo $a['lead_source']?></td>--}}
                            <td>
                                <a href="#" class="btn btn-success btn-xs" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-primary btn-xs" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-xs" title="Excluir"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
    <!-- /.col-md-12 -->
</div>
<!-- /.row -->

@endsection
