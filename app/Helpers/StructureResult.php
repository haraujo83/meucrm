<?php

namespace App\Helpers;

abstract class StructureResult {

	/**
	 * Coloca a string na formatação de CNPJ ou CPF, dependendo do comprimento dela
	 *
	 * @param  array $columns
	 * @param  array $actions
	 * @param  array $data
	 * @param  array $filters
	 * @return array
	 */
	public static function resultStructure($columns, $actions, $data, $filters) {
		
		// Elabora a estrutura do resultado
        $resultStructure = [
			'columns' => [
			  $columns
			],
			'actions' => [
			  $actions
			],
			'data' => $data,
			'filters' => array_filter($filters),
		];
		
		return $resultStructure;
	}

}