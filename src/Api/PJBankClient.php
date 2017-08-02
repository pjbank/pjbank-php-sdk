<?php

namespace PJBank\Api;

use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 01/08/17
 * Time: 15:13
 */
class PJBankClient extends Api
{

    private $client;

    /**
     * API Client Invoker
     * @param [type] $credencial
     * @param [type] $chave
     * @return void
     */
    public function __construct()
    {

        $this->client = new Client([
            'base_uri' => $this->apiBaseUrl,
        ]);

    }

    /**
     * Retorna o Client HTTP feito para a API do PJBank
     * @return GuzzleHttp\Client
     */
    public function getClient() 
    {
        return $this->client;
    }


}