<?php

namespace App\Traits;

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

		if (isset($data['paginacao'])) {
			$this->paginate = $data['paginacao'];
		}

		// Faz os JOINs necessários
		foreach ($joins as $tabela => $info) {
			if (!is_array($info['foreign_id'])) {
				$query = $query->join($tabela, "{$this->table}.id", '=', $info['foreign_id']);
			}else{
				$query = $query->join($tabela, "{$info['foreign_id']['table']}.id", '=', $info['foreign_id']['column']);
			}

			$this->searchable = array_merge($this->searchable, $info['fields'] ?? []);
		}

		// Percorre os campos passados e confere se fazem parte dos permitidos a se buscar
		foreach ($data as $param => $term) {
			if (!is_null($term) && in_array($param, $this->searchable ?? [])) {
				$term = $this->_formatacaoAutomatica($term);
				$query = $query->where($param, 'LIKE', "%$term%");
			}
		}

		// Aplica a busca interna (se passada)
		if (!empty($where)) {
			foreach ($where as $param => $valor) {
				// Comparação simples de igualdade '='
				if (!is_array($valor)) {
					$query = is_null($valor)
						? $query->whereNull($param)
						: $query->where($param, '=', $valor);
				}
				// Comparação diferente de '=' (ex.: ['id' => ['!=', 3]])
				else {
					foreach ($valor as $valor_condicao) {
						$query = is_null($valor_condicao[1])
						? $query->whereNotNull($param) // assume-se que é '!='
						: $query->where($param, $valor_condicao[0], $valor_condicao[1]);
					}
				}
			}
		}

		// Em alguns casos é preciso fazer um GROUP BY
		if (!empty($joins)) {
			$campoGroupBy = array_map(function($join) {
				return $join['group'] ?? null;
			}, $joins);
			$campoGroupBy = array_filter($campoGroupBy);

			$query = $query->groupBy($campoGroupBy);
		}

		// Se não houver ordem, usa a default
		if (!isset($data['_order']) || empty($data['_order'])) {
			$data['_order'] = $this->getDefaultOrderField();
			$data['_direction'] = 'asc';
		}

		// Verifica se os parâmetros de ordenação estão corretos e ordena
		if (isset($data['_order']) && in_array($data['_order'], $this->searchable)) {
			$data['_direction'] = in_array($data['_direction'], ['asc', 'desc']) ? $data['_direction'] : 'asc';
			$query = $query->orderBy($data['_order'], $data['_direction']);
		}

		// Gera o resultado e insere uma flag p/ apontar se uma busca está em andamento
		$resultado = $query->select("{$this->table}.*")->paginate( $this->paginate );
		$resultado->buscaAtiva = array_intersect($this->searchable ?? [], array_keys($data));

		return $resultado;
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
	private function _formatacaoAutomatica($term) {
		$tipos = [
			'data' => '/\d\d\/\d\d\/\d\d\d\d/'
		];
		$formatacao = [
			'data' => function($t) {return \Formata::dataBanco($t);},
		];

		foreach ($tipos as $tipo => $regexp) {
			if (preg_match($regexp, $term)) {
				return $formatacao[$tipo]($term);
			}
		}

		return $term;
	}
}
