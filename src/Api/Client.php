<?php

namespace App\Api;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client
{
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create([
            'verify_peer' => false,
            'base_uri' => 'https://api.websitecarbon.com/',
        ]);
    }

    public function getSite(string $name): array
    {
        $response = $this->client->request('GET', 'site', [
            'query' => [
                'url' => $name,
            ]
        ]);
        return $response->toArray();
    }
}
