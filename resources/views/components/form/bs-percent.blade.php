@php
    use \App\Helpers\FieldElement;

    /* @var string|FieldElement $name */

    $col_n = 4;
    if (isset($attribs['div_col_n'])) {
        $col_n = $attribs['div_col_n'];
        unset($attribs['div_col_n']);
    }

    if ($name instanceof FieldElement) {
        $field = $name;
        $name = $field->getName();
        $labelText = $labelText ?? $field->getLabel();
        if ($field->isRequired()) {
            $attribs['required'] = true;
        }
        $attribs['maxlength'] = $field->getLen();
    }
@endphp

@php
$dataInputmask = '"alias":"numeric","groupSeparator":".","digits":2,"digitsOptional":false,"placeholder":"0","radixPoint":",","rightAlign":false';
@endphp

<div class="col-md-{{ $col_n }}">
    <div class="form-group">
        {{ Form::label($name, $labelText, [], false) }}
        <div class="input-group input-group-sm">
            {{ Form::number($name, $value, array_merge(['class' => 'form-control form-control-sm', 'data-inputmask' => $dataInputmask, 'min' => 0, 'max' => 100], $attribs)) }}
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
        @include('error', ['field' => $name])
    </div>
</div>
