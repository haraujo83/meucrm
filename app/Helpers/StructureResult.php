<?php

namespace App\Helpers;

use App\SCollection;

class StructureResult
{

	/**
	 * Estrutura todo o resultado com colunas e actions e o resultado, e filtros da query
	 * @param  array $columns
	 * @param  array $actions
	 * @param  array $data
	 * @param  array $filters
	 * @return array
	 */
	public static function resultStructure(array $fieldsColumns,  array $actionsColumns, $data, array $filters): array
	{
		// Elabora a estrutura do resultado
        $resultStructure = [
			'columns' => $fieldsColumns,
			'actions' => $actionsColumns,
            'data' => $data,
            'filters' => array_filter($filters),
        ];

        return $resultStructure;
    }

    /**
     * Retorna um array associativo para listar no campo select
     * @param SCollection $resultList
     * @param string $default
     * @param string $fieldsId
     * @param string $fieldDescription
     * @return array
     */
    public function getTraitList(SCollection $resultList, string $default = '-- Todos --', string $fieldsId = 'id', string $fieldDescription = 'descricao'): array
    {
        $rowsAssoc = [];

        if ($default !== '') {
            $rowsAssoc[''] = $default;
        }

        foreach ($resultList as $list) {
            $rowsAssoc[$list[$fieldsId]] = $list[$fieldDescription];
        }

        return $rowsAssoc;
    }
}
