<div class="card card-secondary2" id="fields_search_result_columns">
    <div class="card-header">
        <i class="fas fa-columns"></i> Selecionar Colunas para Resultado
    </div>
    <div class="card-body row m-0 p-0">
        <div class="col-md-6">
            <div class="text-center">
                Colunas Disponíveis:
            </div>
            <ul class="sortable text-muted list-unstyled">
                @foreach($fieldsSearchListNotSelected as $idTable => $label)
                    <li class="list-group-item text-center">
                        {{ $label }}
                        {{ Form::hidden('fields_search[]', $idTable) }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <div class="text-center">
                Colunas Selecionadas:
            </div>
            {{ Form::open(['method' => 'POST', 'id' => 'form_fields_search_result_columns']) }}
            {{ Form::hidden('module', $module) }}
            <ul class="sortable font-weight-bold list-unstyled">
                @foreach($fieldsSearchListSelected as $idTable => $label)
                    <li class="list-group-item text-center">
                        {{ $label }}
                        {{ Form::hidden('fields_search[]', $idTable) }}
                    </li>
                @endforeach
            </ul>
            {{ Form::close() }}
        </div>
    </div>
</div>
