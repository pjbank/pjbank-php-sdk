<?php

namespace PJBank\Cartao;

use PJBank\Api\PJBankClient;

use GuzzleHttp\Exception\ClientException;

/**
 * Class Cancelamento
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Cartao
 */
class Cancelamento
{
    /**
     * Credencial da conta de cartão
     * @var
     */
    private $credencial_cartao;

    /**
     * Chave da conta de cartão
     * @var
     */
    private $chave_cartao;

    /**
     * Cancelamento constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_cartao = $credencial;
        $this->chave_cartao = $chave;
    }

    /**
     * Cancela uma transação de cartão de crédito
     * @param $tid
     */
    public function cancelarTransacao($tid)
    {

        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();

        try {

            $resource = "recebimentos/{$this->credencial_cartao}/transacoes/{$tid}";

            $res = $client->request('DELETE', $resource, ['json' => [], 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->chave_cartao
            ]]);

            return json_decode((string)$res->getBody());

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);

        }
    }

}