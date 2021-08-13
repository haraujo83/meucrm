<?php

namespace App\Traits;

use App\SCollection;
use Illuminate\Support\Collection;

trait TrataCollection {
	/**
	 * Substitui a \Illuminate\Support\Collection por \App\SCollection
	 *
	 * @param  array $models
	 * @return \App\SCollection
	 */
	public function newCollection(array $models = []) {
		return new SCollection($models);
    }

	/**
	 * Retorna somente a propriedade de cada objeto
	 *
	 * @param  string $propriedade
	 * @return array
	 */
	public static function prop($propriedade) {
		return self::get()->prop($propriedade);
	}

	/**
	 * Deixa a collection ficar no formato passado
	 *
	 * @param  array $formato
	 * @return \App\SCollection
	 */
	public static function formata($formato) {
		return self::get()->formata($formato);
	}
}
