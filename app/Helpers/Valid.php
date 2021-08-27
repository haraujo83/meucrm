<?php

namespace App\Helpers;

use App\Helpers\Format;

abstract class Valid {
	/**
	 * Verifica se o CNPJ é válido
	 *
	 * @param  string $cnpj
	 * @return bool
	 */
	public static function cnpj($cnpj) {
		$cnpj = Format::onlyNumbers($cnpj);

		// Não é CNPJ
		if (strlen($cnpj) != 14) {
			return false;
		}

		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
			$sum += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$rest = $sum % 11;

		if ($cnpj[12] != ($rest < 2 ? 0 : 11 - $rest))
			return false;

		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
			$sum += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$rest = $sum % 11;

		return $cnpj[13] == ($rest < 2 ? 0 : 11 - $rest);
	}

	/**
	 * Verifica se o CPF é válido
	 *
	 * @param  string $cpf
	 * @return bool
	 */
	public static function cpf($cpf) {
		$cpf = Format::onlyNumbers($cpf);

		// Verifica se tem o comprimento certo
		if(strlen($cpf) != 11) {
			return false;
		}

		// Todos os caracteres iguais?
		$cpfConta = array_unique(str_split($cpf));
		if (count($cpfConta) == 1) {
			return false;
		}

		// Cálculo de validação
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
			}
		}

		return true;
	}
}
