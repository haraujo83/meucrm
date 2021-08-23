<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest {
	/**
	 * Se a resposta deve ser em JSON
	 *
	 * @var bool
	 */
	protected $json = false;

	/**
	 * Guarda a resposta p/ converter em JSON, se for apropriado usa-la
	 *
	 * @var array
	 */
	protected $resultJSON;

	/**
	 * Guarda os códigos de cada status (para respostas)
	 *
	 * @var array
	 */
	private static $_codes = [
		// Requição válida
		200 => 'OK',
		// Recurso criado com success
		201 => 'Created',
		// Validação parou ou dados informados no formato errado
		400 => 'Bad Request',
		// Autenticação necessária
		401 => 'Unauthorized',
		// Recurso não encontrado
		404 => 'Not Found',
		// Método não permitido nesse formato
		405 => 'Method Not Allowed',
		// Conflito nas regras de negócio (como tentar cadstrar o mesmo recurso 2x)
		409 => 'Conflict',
		// Um recurso que não pode sofrer a ação, por exemplo
		422 => 'Unprocessable Entity',
		// Erro inesperado e (talvez) não identificado
		500 => 'Internal Server Error',
	];

	/**
	 * Construtor para validações JSON (validação diferente embutida)
	 *
	 * @return $this
	 */
	public function __construct() {
		if ($this->json) {
			$this->validRequestJson();

			return $this;
		}

		return parent::__construct();
	}

	/**
	 * Chama um método p/ tratamento da input, se existir
	 *
	 * @return \Symfony\Component\HttpFoundation\ParameterBag
	 */
	public function getInputSource() 
    {
		$data = parent::getInputSource();

		if (method_exists($this, 'formatInput')) {
			return $this->formatInput($data);
		}

		return $data;
	}

	/**
	 * Validação que retorna variáveis de resposta padronizadas
	 *
	 * @return void
	 */
	private function validRequestJson() 
    {
		$request = app('request');

		// Pega regras e mensagems de validação
		$rules    = $this->rules();
		$messages = $this->messages();

		// Se existe um método de formatação de dados pré-validation, chama
		// $data = $request->getInputSource();
		$data = $request->all();
		$data = new \Symfony\Component\HttpFoundation\ParameterBag($data);
		if (method_exists($this, 'formatInput')) {
			$data = $this->formatInput($data);
		}

		// Faz a validação
		$validator = Validator::make($data->all(), $rules, $messages);

		// Não passou
		if ($validator->fails()) {
			$success = false;
			$message = 'Alguns campos não foram preenchidos corretamente.';
			$errors = $validator->errors();

			// Une as variáveis na resposta JSON
			$this->resultJSON = compact('success', 'message', 'errors');
		}
	}

	/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

	/**
	 * Devolve a resposta apropriada
	 *
	 * @param  array $errors
	 * @return mixed
	 */
	public function response(array $errors) {
		// Se não houver resposta JSON pronta, então devolve a resposta comum do FormRequest
		if (!$this->resultJSON) {
			return parent::response($errors);
		}

		// Resposta JSON
		return response()->json($this->resultJSON, 400);
	}

	/**
	 * Devolve o código de $status
	 *
	 * @param string $status 	O status a buscar
	 * @return int
	 */
	public static function getStatusCode($status) {
		$status = strtolower($status);
		$codes = array_map('strtolower', self::$_codes);
		$codes = array_flip($codes);

		if (!isset($codes[$status])) {
			throw new Exception("Código de status não encontrado.");
		}

		return $codes[$status];
	}
}
