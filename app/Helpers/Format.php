<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

abstract class Format {

	/**
	 * Coloca a string na formatação de CNPJ ou CPF, dependendo do comprimento dela
	 *
	 * @param  string $number
	 * @return string
	 */
	public static function cnpjCpf($number) {
		if (strlen($number) == 11) {
			return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $number);
		}

		return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $number);
	}

	/**
	 * Alias para o método cnpjCpf()
	 *
	 * @param  string $number
	 * @return string
	 */
	public static function cpfCnpj($number) {
		return self::cnpjCpf($number);
	}
	
	/**
	 * Devolve somente caracteres numéricos
	 *
	 * @param  string $string
	 * @return string
	 */
	public static function onlyNumbers($string) {
		if (!$string) {
			return $string;
		}

		return preg_replace('/[^0-9]/', '', $string);
	}

	/**
	 * Transforma a data para um formato legível
	 *
	 * @param  string $date
	 * @return string
	 */
	public static function legibleDate($date, $hideTime = false) {
		// Já formatada
		if (empty($date) || false !== strpos($date, '/')) {
			return $date;
		}

		// Divide date e hour em vars
		@list($date, $hour) = explode(' ', $date);

		// Formata a date
		$date = date_create_from_format('Y-m-d', $date)->format('d/m/Y');

		// Existe hour? Adiciona à string de date
		if (!$hideTime && !empty($hour)) {
			$date = "{$date} " . substr($hour, 0, 5);
		}

		return $date;
	}

	/**
	 * Formata para padrão Y-m-d
	 *
	 * @param  string $date
	 * @return string
	 */
	public static function bankDate($date) {

		if ($d = date_create_from_format('d/m/Y', $date)) {
			return $d->format('Y-m-d');
		}

		if($d = date_create_from_format('d/m/Y H:i', $date)) {
			return $d->format('Y-m-d H:i');
		}

		return $date;
	}

	/**
	 * Formata uma string para um formato de telefone conhecido
	 *
	 * @param  string $number
	 * @return string
	 */
	public static function phone($number) {
		// Remove o que não for número
		$number = preg_replace('/\D/', '', $number);

		// Nenhum formato conhecido
		if (strlen($number) < 8) {
			return $number;
		}

		// Até 9 dígitos
		if (strlen($number) <= 9) {
			return preg_replace('/(\d{4})(\d*)/', '$1-$2', $number);
		}

		// Demais formatos
		return preg_replace('/(\d{2})(\d{4})(\d*)/', '($1) $2-$3', $number);
	}

	/**
	 * Formata uma string para um formato do CEP
	 *
	 * @param  string $number
	 * @return string
	 */
	public static function cep($number) {
		// Remove o que não for número
		$number = preg_replace('/\D/', '', $number);

		// Nenhum formato conhecido
		if (strlen($number) != 8) {
			return $number;
		}

		return preg_replace('/(\d{5})(\d*)/', '$1-$2', $number);
	}

	/**
	 * Remove um elemento do array de acordo com o valor
	 *
	 * @param  array $array
	 * @param  mixed $arrayValue
	 * @return array
	 */
	public static function removeValueFromArray($array, $arrayValue) {
		return array_diff($array, [$arrayValue]);
	}

	/**
	 * Transforma um decimal com pontos p/ um com vírgulas
	 *
	 * @param  mixed $number
	 * @return string
	 */
	public static function decimalVirgula($number) {
		// Chama esse método recursivamente
		if (is_array($number)) {
			return array_map('self::decimalVirgula', $number);
		}

		$number = strval($number);

		// Não é número
		if (!is_numeric($number)) {
			return $number;
		}

		return str_replace('.', ',', $number);
	}

	/**
	 * Transforma um decimal com vírgula p/ um com ponto
	 *
	 * @param  mixed $number
	 * @return string
	 */
	public static function decimalPoint($number) {
		return str_replace(',', '.', $number);
	}

	/**
	 * Trata o valor do decimal para gravação na base de dados
	 *
	 * @param  mixed $number
	 * @return string
	 */
	public static function decimalBank($number) {
		$number = str_replace('.', '', $number);
		$number = str_replace(',', '.', $number);
		return $number;
	}

	/**
	 * Trata o valor do decimal para gravação na base de dados
	 *
	 * @param  mixed $number
	 * @return string
	 */
	public static function decimal($number, $decimalsPlaces = null) {

		// Verifica se não é um número
		if (!is_numeric($number)) {
			return $number;
		}

		// Verifica se foi passado um valor para o parâmetro $decimalsPlaces
		if (empty($decimalsPlaces)) {
			// Armazena a quantidade de casas depois do ponto
			$decimalsPlaces = explode('.', $number);
			$decimalsPlaces = strlen($decimalsPlaces[1]);
		}

		// Formata o valor conforme a quantidade de casas encontrada no número passado por parâmetro
		$number = number_format($number, $decimalsPlaces, ",", ".");

		return $number;
	}
}
?>
