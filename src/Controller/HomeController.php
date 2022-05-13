<?php

namespace App\Controller;

use App\Api\Client;

class HomeController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Home/form.html.twig');
    }

    public function show(): string
    {
        $errors = [];
        $array = ['http', 'https'];
        $api = new Client();

        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $response = $api->getSite($_GET['url']);
        } else {
            $errors['url'] = 'input something';
            $response = [];
        }

        return $this->twig->render('Home/test.html.twig', [
            'errors' => $errors,
            'response' => $response,
            'stats' => $response['statistics']['co2']['grid']
        ]);
    }
}
