<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadsSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
			'cpf'              => 'nullable|min:14|max:14|cpf',
			'telefone_contato' => 'nullable|min:12|max:13|integer',
			'email'            => 'nullable|email',
		];
    }

    public function messages(): array
    {
		return [
			'cpf.min'              => 'Informe um CPF válido.',
			'cpf.max'              => 'Informe um CPF válido.',
			'cpf.cpf'              => 'Este CPF é inválido.',
			'telefone_contato.min' => 'Informe um telefone válido.',
            'telefone_contato.max' => 'Informe um telefone válido.',
			'telefone_contato.integer' => 'Informe um telefone válido.',
			'email.email'          => 'Informe um e-mail válido.',
		];
	}
}
