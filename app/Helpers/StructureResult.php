<?php

namespace App\Helpers;

use App\SCollection;

class StructureResult
{

    /**
     * Coloca a string na formatação de CNPJ ou CPF, dependendo do comprimento dela
     *
     * @param  array $columns
     * @param  array $actions
     * @param  array $data
     * @param  array $filters
     * @return array
     */
    public static function resultStructure($module, $columns, $actions, $data, $filters)
    {
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

    /**
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
