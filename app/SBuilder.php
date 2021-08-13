<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SBuilder extends Builder {

	/**
	 * Retorna somente a propriedade de cada objeto
	 *
	 * @param  string $property
	 * @return array
	 */
	public function prop($property) {
		return $this->get()->prop($property);
	}

	/**
	 * Faz a collection ficar no formato passado
	 *
	 * @param  array $format
	 * @return \App\SCollection
	 */
	public function format(array $format) {
		return $this->get()->format($format);
	}

	/**
	 * Devolve um array com as colunas para popular um <select>
	 *
	 * @param  string $id
	 * @param  string $value
	 * @return array
	 */
	public function asOptions($key = 'id', $value = 'nome') {
		$ordenado = !empty($this->getQuery()->orders);

		return $this
			->orderBy($value, 'asc')
			->get()
			->asOptions($key, $value);
	}
}
