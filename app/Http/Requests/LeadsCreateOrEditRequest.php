<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadsCreateOrEditRequest extends FormRequest
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
        $requestProduct = request()->input('parent_type');

        return [
			'cpf'              => 'nullable|min:14|max:14|cpf',
			'parent_type'      => 'required',
            'first_name'       => 'required|min:3|max:20',
            'last_name'        => 'required|min:3|max:60',
            'birthdate'        => 'nullable|date_format:d/m/Y',
            'email'            => 'nullable|email',
            'phone_mobile'     => 'nullable|min:12|max:13|integer',
            'account_id'       => 'nullable',
            'telefone_contato' => 'nullable|min:12|max:13|integer',
            'status'           => 'nullable',
            'amount'           => 'nullable|numeric|between:0,99999999.99',
            'parcela'          => 'nullable|numeric|between:0,9999999.99',
            'prazo'            => 'nullable|integer',
            'tipo_imovel_list' => 'nullable',
            'tem_imovel_list'  => 'nullable',
            'valor_imovel'     => 'nullable|numeric|between:0,99999999.99',
            'valor_financiamento' => 'nullable|numeric|between:0,99999999.99',
            'taxa_juros'        => 'nullable|numeric|between:0,999.99',
            'parcela_primeira'  => 'nullable|numeric|between:0,9999999.99',
            'parcela_ultima'    => 'nullable|numeric|between:0,9999999.99',
            'empreendimento_id' => 'nullable',
		];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
		return [
			'cpf.min'              => 'Informe um CPF válido.',
			'cpf.max'              => 'Informe um CPF válido.',
			'cpf.cpf'              => 'Este CPF é inválido.',
            'parent_type.required'   => 'Informe o produto',
            'first_name.required'  => 'Informe o nome',
            'first_name.min'       => 'Informe o nome com no mínimo de :min caracteres.',
            'first_name.max'       => 'Informe o nome com no máximo de :max caracteres.',
            'last_name.required'   => 'Informe o sobrenome',
            'last_name.min'        => 'Informe o sobrenome com no mínimo de :min caracteres.',
            'last_name.max'        => 'Informe o sobrenome com no máximo de :max caracteres.',
            'birthdate.date_format' => 'Informe uma data válida.',
			'email.email'           => 'Informe um e-mail válido.',
            'phone_mobile.required' => 'Informe o celular.',
            'phone_mobile.min'      => 'Informe um celular com no mínimo de :min caracteres.',
            'phone_mobile.max'      => 'Informe um celular com no máximo de :max caracteres.',
			'phone_mobile.integer'  => 'Informe um celular válido.',
            'account_id.required'   => 'Informe a conta.',
            'telefone_contato.min'  => 'Informe um telefone com no mínimo de :min caracteres.',
            'telefone_contato.max'  => 'Informe um telefone com no máximo de :max caracteres.',
			'telefone_contato.integer' => 'Informe um telefone válido.',
            'status.required'       => 'Informe o status.',
            'amount.required'       => 'Informe o valor de crédito R$.',
            'amount.between'        => 'Informe o valor de crédito de R$ :min a R$ :max.',
            'parcela.between'       => 'Informe o valor de crédito de R$ :min a R$ :max.',
            'prazo.integer'         => 'Informe um prazo válido.',
            'tipo_imovel_list.required' => 'Informe um tipo de imóvel.',
            'valor_imovel.required'     => 'Informe o valor do imóvel.',
            'valor_imovel.between'      => 'Informe o valor do imóvel de R$ :min a R$ :max.',
            'valor_financiamento.required' => 'Informe o valor do financiamento do imóvel.',
            'valor_financiamento.between'  => 'Informe o valor de financiamento de R$ :min a R$ :max.',
            'taxa_juros.between'           => 'Informe o valor de taxa de juros de :min % a :max %.',
            'parcela_primeira.between'     => 'Informe o valor da primeira parcela de R$ :min a R$ :max.',
            'parcela_ultima.between'       => 'Informe o valor da última parcela de R$ :min a R$ :max.',
		];
	}
}
