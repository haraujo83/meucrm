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
    	
    @include('link-table-order', ['title' => {{ $column['title'] }}, 'field' => {{ $column['field'] }}])