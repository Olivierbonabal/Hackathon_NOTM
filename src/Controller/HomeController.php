<?php

namespace App\Controller;

use App\Api\Client;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $errors = [];
        $api = new Client();
        if(isset($_GET['url'])) {
            $response = $api->getSite($_GET['url']);
//            foreach ($response as $index => $value) {
//
//            }
        } else {
            $error['url'] = 'input something';
        }

        var_dump($_GET);
        var_dump($response);
        return $this->twig->render('Home/index.html.twig', [
            'errors' => $errors,
            'response' => $response
        ]);
    }
}
