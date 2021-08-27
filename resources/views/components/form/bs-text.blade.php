<div class="col-md-4">
    <div class="form-group">
        {{ Form::label($name, $labelText) }}
        {{ Form::text($name, $value, array_merge(['class' => 'form-control form-control-sm'], $attribs)) }}
        @include('error', ['field' => $name])
    </div>
</div>
