@php
$col_n = 4;
if (isset($attribs['div_col_n'])) {
    $col_n = $attribs['div_col_n'];
    unset($attribs['div_col_n']);
}
@endphp

<div class="col-md-{{ $col_n }}">
    <div class="form-group">
        {{ Form::label($name, $labelText) }}
        {{ Form::number($name, $value, array_merge(['class' => 'form-control form-control-sm'], $attribs)) }}
        @include('error', ['field' => $name])
    </div>
</div>
