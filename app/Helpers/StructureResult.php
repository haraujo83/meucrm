<?php

namespace App\Helpers;

use App\SCollection;

use App\Helpers\Format;

use App\Models\Field;
use App\Models\Action;

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
	protected static function resultStructure(array $fieldsColumns, $data, array $filters): array
	{
		// Elabora a estrutura do resultado
        $resultStructure = [
			'columns' => $fieldsColumns,
			'data' => $data,
            'filters' => array_filter($filters),
        ];

        return $resultStructure;
    }

    public static function resultData(string $module, $data, array $filters, string $nameId)
    {
        $fields = new Field();
        $actions = new Action();
        
        $fieldsColumns = $fields->returnFieldsResult($module);
        $resultStructure = self::resultStructure($fieldsColumns, $data, $filters);

        $actionsResults = [];
        $item = 0;
        foreach($resultStructure['data'] as $result)
        {
            foreach($fieldsColumns as $fieldColumn)
            {
                //date
                if($fieldColumn['type'] == 'date' || $fieldColumn['type'] == 'datetime')
                {
                    if($result[$fieldColumn['field']] != '0000-00-00')
                    {
                        $fieldColumn['type'] == 'date' ? $hideTime = true : $hideTime = false;
                        $result[$fieldColumn['field']] = Format::legibleDate($result[$fieldColumn['field']], $hideTime);
                    }
                    else
                    {
                        $result[$fieldColumn['field']] = '';
                    }
                }
                //decimal
                //
                //

            }

            $id = $resultStructure['data'][$item][$nameId];
            $actionsColumns = $actions->returnActionsResult($module, $id, true, true, true);
            $actionsResults[$id] = $actionsColumns;
            
            $item++;
        }

        $actions = ['actions' => $actionsResults, 'ColumnId' => $nameId];
        $resultStructure = array_merge($resultStructure, $actions);	
        
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

        if ($default !== '')
            $rowsAssoc[''] = $default;

        foreach ($resultList as $list) 
        {
            $rowsAssoc[$list[$fieldsId]] = $list[$fieldDescription];
        }

        return $rowsAssoc;
    }
}
