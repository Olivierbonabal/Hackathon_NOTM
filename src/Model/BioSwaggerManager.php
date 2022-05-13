<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class BioSwaggerManager
{
    public function getAll(): array
    {

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();
        return $content;
    }
}
