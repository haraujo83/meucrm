<?php

namespace App\Traits;

use App\Helpers\Format;

trait PaginateWithSearch {
	protected $paginate = 20;

	/**
     * Faz busca com os campos sendo passados pelo Request
	 *
	 * @param  array $joins
	 * @param  array $where
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateWithSearch($joins = [], $where = []) {
		// Campos sendo passados por request
		$data = app('request')->all() ?: [];
		$query = $this;

		if (isset($data['pagination'])) {
			$this->paginate = $data['pagination'];
		}

		// Faz os JOINs necessários
		foreach ($joins as $table => $info) {
			if (!is_array($info['foreign_id'])) {
				$query = $query->join($table, "{$this->table}.id", '=', $info['foreign_id']);
			}else{
				$query = $query->join($table, "{$info['foreign_id']['table']}.id", '=', $info['foreign_id']['column']);
			}

			$this->searchable = array_merge($this->searchable, $info['fields'] ?? []);
		}

		// Percorre os campos passados e confere se fazem parte dos permitidos a se buscar
		foreach ($data as $param => $term) {
			if (!is_null($term) && in_array($param, $this->searchable ?? [])) {
				$term = $this->_automaticFormatting($term);
				$query = $query->where($param, 'LIKE', "%$term%");
			}
		}

		// Aplica a busca interna (se passada)
		if (!empty($where)) {
			foreach ($where as $param => $value) {
				// Comparação simples de igualdade '='
				if (!is_array($value)) {
					$query = is_null($value)
						? $query->whereNull($param)
						: $query->where($param, '=', $value);
				}
				// Comparação diferente de '=' (ex.: ['id' => ['!=', 3]])
				else {
					foreach ($value as $conditionValue) {
						$query = is_null($conditionValue[1])
						? $query->whereNotNull($param) // assume-se que é '!='
						: $query->where($param, $conditionValue[0], $conditionValue[1]);
					}
				}
			}
		}

		// Em alguns casos é preciso fazer um GROUP BY
		if (!empty($joins)) {
			$fieldGroupBy = array_map(function($join) {
				return $join['group'] ?? null;
			}, $joins);
			$fieldGroupBy = array_filter($fieldGroupBy);

			$query = $query->groupBy($fieldGroupBy);
		}

		// Se não houver ordem, usa a default
		if (!isset($data['_order']) || empty($data['_order'])) {
			$data['_order'] = $this->getDefaultOrderField();
			$data['_direction'] = 'asc';
		}

		//dd($data['_order']);

		// Verifica se os parâmetros de ordenação estão corretos e ordena
		/*if (isset($data['_order']) && in_array($data['_order'], $this->searchable)) {
			$data['_direction'] = in_array($data['_direction'], ['asc', 'desc']) ? $data['_direction'] : 'asc';
			$query = $query->orderBy($data['_order'], $data['_direction']);
		}*/

		if (isset($data['_order']) && isset($data['_direction'])) {
			//$data['_direction'] = in_array($data['_direction'], ['asc', 'desc']) ? $data['_direction'] : 'asc';
			$query = $query->orderBy($data['_order'], $data['_direction']);
		}

		// Gera o resultado e insere uma flag p/ apontar se uma busca está em andamento
		$result = $query->select("{$this->table}.*")->paginate( $this->paginate );
		$result->ActiveSearch = array_intersect($this->searchable ?? [], array_keys($data));

		return $result;
	}

	/**
     * Faz busca com os campos sendo passados pelo Request
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function paginateAndSearch($joins = [], $where = []) {
		$instance = new self;

		return $instance->paginateWithSearch($joins, $where);
    }

	/**
	 * Campo default para ordenar o paginateWithSearch
	 *
	 * @return string
	 */
	protected function getDefaultOrderField() {
		return 'id';
	}

	/**
	 * Identifica uma formatação de campo automaticamente, se existir (ex. datas)
	 *
	 * @param  string $term
	 * @return string
	 */
	private function _automaticFormatting($term) {
		$types = [
			'data' => '/\d\d\/\d\d\/\d\d\d\d/'
		];
		$format = [
			'data' => function($t) {return Format::bankDate($t);},
		];

		foreach ($types as $type => $regexp) {
			if (preg_match($regexp, $term)) {
				return $format[$type]($term);
			}
		}

		return $term;
	}
}
