<?php
namespace App\Domains\company\Services;

use Exception;
use GuzzleHttp\Client;

class StockService implements IStockService {
    public function getStockValue($symbol): ?array {

        $url = 'https://api.polygon.io/v2/aggs/ticker/AAPL/range/1/day/2023-01-09/2023-01-09?apiKey=' . env('POLYGON_API_KEY');

        $client = new Client();

        try {

            $response = $client->get($url);

        } catch (Exception $e) {

            return null;
        }

        return json_decode($response->getBody()->getContents(), true)['results'][0];
    }
}