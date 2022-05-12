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
            'base_uri' => 'https://koumoul.com/data-fair/api/v1/datasets/agribalyse-synthese/',
        ]);
    }
    public function getFruitsByName(string $name): array
    {
        $response = $this->client->request('GET', 'lines', [
            'query' => [
                'select' => 'Code_AGB,Nom_du_Produit_en_Français', //
                'q' => $name,
            ]
        ]);
        return $response->toArray();
    }
    public function getValues(string $field): array
    {
        $response = $this->client->request('GET', 'values/'.$field, [
            'query' => [
                'size' => 200,
            ]
        ]);
        return $response->toArray();
    }
}
