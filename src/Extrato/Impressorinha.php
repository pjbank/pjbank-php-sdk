<?php

namespace PJBank\Extrato;

use PJBank\Api\PJBankClient;

use GuzzleHttp\Exception\ClientException;

/**
 * Impressorinha de extrato
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Extrato
 */
class Impressorinha
{

    /**
     * Instância do Extrato
     * @var PJBank\Extrato\Extrato
     */
    private $extrato;

    /**
     * Impressorinha constructor.
     * @param Extrato $extrato
     */
    public function __construct(Extrato $extrato)
    {
        $this->extrato = $extrato;
    }

    /**
     * Gera um extrato bancário
     */
    public function gerar()
    {

        $PJBankClient = new PJBankClient($this->extrato->getSandbox());
        $client = $PJBankClient->getClient();

        $extratoQuery = $this->extrato->getValues();

        unset($extratoQuery['credencial']);
        unset($extratoQuery['chave']);
        unset($extratoQuery['sandbox']);

        try {
            $resource = "recebimentos/{$this->extrato->getCredencial()}/transacoes";

            $res = $client->request('GET',  $resource, ['query' => $extratoQuery, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->extrato->getChave()
            ]]);

            return json_decode((string) $res->getBody());

        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);
        }
    }

}