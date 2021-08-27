<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 *
 */
class FieldsSearchModuleResultColumnsSaveRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'module' => 'required',
            'fields_search' => 'required|array|max:10',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'module.required' => 'O módulo não foi informado',
            'fields_search.required' => 'Nenhuma coluna foi selecionada',
            'fields_search.max' => 'Selecione no máximo :max colunas',
        ];
    }

    /**
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $message = current(current($validator->errors()))[0];

        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => $message,
            'data'      => $validator->errors()
        ], 422));
    }
}
