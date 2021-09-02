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
$dataInputmask = '"mask":"(9{2})9{8}9{0,1}"';
@endphp

<div class="col-md-{{ $col_n }}">
    <div class="form-group">
        {{ Form::label($name, $labelText, [], false) }}
        {{ Form::tel($name, $value, array_merge(['class' => 'form-control form-control-sm'], array_merge(['data-inputmask' => $dataInputmask], $attribs))) }}
        @include('error', ['field' => $name])
    </div>
</div>
