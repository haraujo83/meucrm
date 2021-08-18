<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Validação da busca de contas pelo nome
 */
class AccountNameSearchRequest extends FormRequest
{
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
            'term' => 'required|min:3',
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
            'term.required' => 'Nenhum texto foi informado',
            'term.min' => 'O texto deve conter no mínimo :min caracteres',
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
