<?php

namespace App\Controller;

use App\Api\Client;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $api = new Client();
        //print_r($api->getFruitsByName('Agneau'));die;
        print_r($api->getValues('Nom_du_Produit_en_Français'));
    }
