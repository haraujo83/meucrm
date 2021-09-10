@php
    use \App\Helpers\FieldElement;

    /* @var string|FieldElement $name */
    /* @var array $list */
    /* @var array $attribs */

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

        $list = $list ?? $field->getList();
    }

    if (in_array('one', $attribs, true)) {
        $key = array_search('one', $attribs, true);

        $list = ['' => '-- Selecione --']+$list;
        unset($attribs[$key]);
    }
@endphp

<div class="col-md-{{ $col_n }}">
    <div class="form-group">
        {{ Form::label($name, $labelText, [], false) }}
        {{ Form::select($name, $list, $value, array_merge(['class' => 'form-control form-control-sm select2'], $attribs)) }}
        @include('error', ['field' => $name])
    </div>
</div>
