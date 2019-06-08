<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\APIHelper;
use GuzzleHttp\Client;

class CepController extends Controller
{
    public function cep($cep)
    {
        if (!preg_match('/([0-9]{8})+/', $cep)) {
            return APIHelper::response(400 , ['Error badly formatted zip use just numbers without special characters']);
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https://viacep.com.br/ws/{$cep}/json/");

        if ($response->getStatusCode() == 200) {
            $address = $response->getBody();
            return APIHelper::response(200, [], json_decode($address));
        }

        return APIHelper::response(400, ['Error the CEP API is wrong']);
    }
}
