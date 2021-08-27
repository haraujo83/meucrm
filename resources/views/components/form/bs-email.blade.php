<div class="col-md-4">
    <div class="form-group">
        {{ Form::label($name, $labelText) }}
        {{ Form::email($name, $value, array_merge(['class' => 'form-control form-control-sm'], $attribs)) }}
        @include('error', ['field' => $name])
    </div>
</div>
