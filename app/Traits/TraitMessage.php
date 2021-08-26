<?php

namespace App\Traits;

trait TraitMessage 
{
	
	/**
	 *
	 * @param boolean $sucesso 
	 * @param array $data
	 * @return json $returnJson
	 */
	public static function returnMessageJson($data = '') {
        return self::error($data['errors']);
	}

	/**
	 *
	 * @return json $returnJson
	 */
	public static function success()
	{
        $returnJson = [
            'message' => 'Sucesso', 
            'icon' => 'success'
        ];

		return $returnJson;
	}

	/**
	 *
	 * @param array $errors
	 * @return json $returnJson
	 */
	public static function error($errors = null)
	{
		$returnJson = [
            'message' => 'Sucesso', 
            'icon' => 'success',
			'errors' => $errors
        ];

		return $returnJson;
	}

}