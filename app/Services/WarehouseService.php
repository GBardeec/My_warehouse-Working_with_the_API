<?php

namespace App\Services;

use GuzzleHttp\Client;

class WarehouseService
{
    protected readonly Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://online.moysklad.ru/api/remap/1.2/',
            'headers' => [
                'Authorization' => 'Bearer '.config('warehouse.token'),
            ],
            'verify' => false,
        ]);
    }

    public function getServices()
    {
        $response = $this->client->get('entity/service');
        return json_decode($response->getBody(), true);
    }
}
