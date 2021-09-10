<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use JsonException;

/**
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @param string $method
     * @param array $query
     * @param array $data
     * @param array $headers
     * @return array
     */
    protected function apiResponse(
        string $method,
        array $query = [],
        array $data = [],
        array $headers = []
    ): array {
        $method = strtoupper($method);

        $http = Http::acceptJson()
            ->baseUrl(env('HOST_API'))
            ->withHeaders($headers)
            ->withCookies(['XDEBUG_SESSION' => 1], env('HOST_API'))
            ->asJson()
            ;

        if (!empty($data)) {
            try {
                $json = json_encode($data, JSON_THROW_ON_ERROR);
            } catch (JsonException $e) {
                $json = '';
            }

            $http = $http->withBody($json, 'application/json');
        }

        if ($method === 'POST') {
            $response = $http->post('', $data);
        } elseif ($method === 'DELETE') {
            $response = $http->delete('', $data);
        } else {
            $response = $http->get('', $query);
        }

        $response->throw(function ($response, $e) {
            die($response->body());
        });

        return $response->json();
    }

    /**
     * @param array $query
     * @param array $headers
     * @return array
     */
    protected function apiGet(array $query = [], array $headers = []): array
    {
        $json = $this->apiResponse('GET', $query, [], $headers);
        if ($json['return']['type'] === 'error') {

        }

        return $json;
    }

    /**
     * @param array $params
     * @param array $query
     * @param array $headers
     * @return array
     */
    protected function apiPost(array $params, array $query = [], array $headers = []): array
    {
        $json = $this->apiResponse('POST', $query, $params, $headers);

        if ($json['return']['type'] === 'error') {

        }

        return $json;
    }

    /**
     * @param string $path
     * @param array $params
     * @param array $query
     * @param array $headers
     * @return Response
     */
    protected function apiDelete(string $path, array $params, array $query = [], array $headers = []): Response
    {
        return $this->apiResponse($path, 'DELETE', $query, $params, $headers);
    }
}
