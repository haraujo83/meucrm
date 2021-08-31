@extends('template')

@section('content')
<div class="content">
    <div class="row p-2">
        <div class="col-12">
            <a href="{{route($module.'.create')}}" class="btn btn-primary float-right" data-tippy title="{{ $titleButton }}"><i class="fas fa-plus"></i> {{ $titleButton }}</a>
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
                {{ Form::open(['method' => 'GET', 'class' => 'form-search', 'route' => $module.'.result']) }}
                    {{ Form::hidden('pagination', 20) }}
                    {{ Form::hidden('module', $module) }}
                    {{ Form::hidden('hostname', $_SERVER['HTTP_HOST']) }}
                        @include($module.'/search')
                        @include('search/selectColumns')
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::button('Buscar', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                            </div>
                        </div>
                        <!--/.row -->
                    {{ Form::close() }}
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
