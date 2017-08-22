<?php

namespace PJBank\Boleto;

use PJBank\Api\PJBankClient;

use GuzzleHttp\Exception\ClientException;

/**
 * Class Impressor
 * Faz a impressão de boletos em lote
 * @package PJBank\Boleto
 */
class Impressor
{

    /**
     * Credencial do Boleto
     * @var
     */
    private $credencial;

    /**
     * Chave do Boleto
     * @var
     */
    private $chave;

    /**
     * Impressor constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial = $credencial;
        $this->chave = $chave;
    }

    /**
     * Gera um link com a impressão de um ou mais boletos
     * @param array $boletos
     */
    public function imprimirEmLotes(array $boletos) {

        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();

        $resource = "recebimentos/{$this->credencial}/transacoes/lotes";

        try {

            $numerosBoleto = array(
                "pedido_numero" => $boletos
            );

            $res = $client->request('POST', $resource, ['json' => $numerosBoleto, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->chave
            ]]);

            return json_decode((string) $res->getBody());

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());

            print_r($responseBody); die();

            throw new \Exception($responseBody->msg, $responseBody->status);

        }


    }

}