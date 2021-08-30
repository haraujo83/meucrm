@extends('template')

@section('content')
<div class="content">
    <div class="row p-2">
        <div class="col-12">
            <a href="{{route($module.'.create')}}" class="btn btn-primary float-right" data-tippy-content="Criar novo Lead"><i class="fas fa-plus"></i> Novo Lead</a>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary2">
                <div class="card-header">
                    @include('components.card-title', ['cardTitle' => '<i class="fas fa-search"></i> Buscar'])
                    <div class="card-tools">
                        @include('components.btn-collapse')
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include($module.'/search')
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="result-index">

    </div>
    <!-- /.result-index -->
</div>
@endsection
