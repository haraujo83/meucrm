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
                    @include('leads/search')
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    @include('result', ['resultData' => $resultStructure])
</div>
@endsection
