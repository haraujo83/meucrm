<div class="col-md-4">
    <div class="form-group">
        {{ Form::label($name, $labelText) }}
        {{ Form::select($name, $list, $value, array_merge(['class' => 'form-control form-control-sm select2'], $attribs)) }}
        @include('error', ['field' => $name])
    </div>
</div>
