<?php

namespace PJBank\Cartao;

use PJBank\Api\PJBankClient;

use GuzzleHttp\Exception\ClientException;

/**
 * Class Maquininha - Gera transações de cartão de crédito no PJBank
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Cartao
 */
class Maquininha
{

    /**
     * Objeto da transação atual de cartão de crédito
     * PJBank\Cartao\Transacao
     * @var
     */
    private $transacao;


    /**
     * Maquininha constructor.
     * @param Transacao $transacao
     */
    public function __construct(Transacao $transacao)
    {
        $this->transacao = $transacao;
    }

    /**
     * Gera uma transação de cartão de crédito
     * @return mixed
     * @throws \Exception
     */
    public function transmitir()
    {
        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();

        $transacaoItens = $this->transacao->getValues();

        try {

            $resource = "recebimentos/{$this->transacao->getCredencialCartao()}/transacoes";

            $res = $client->request('POST',  $resource, ['json' => $transacaoItens, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->transacao->getChaveCartao()
            ]]);

            return json_decode((string) $res->getBody());

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);
            
        }

    }

    /**
     * Tokeniza um cartão de crédito
     * @return string cartão tokenizado
     * @throws \Exception
     */
    public function tokenizarCartao()
    {

        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();

        $tokenItens = $this->transacao->getValues();

        unset($tokenItens['credencial_cartao']);
        unset($tokenItens['chave_cartao']);

        try {

            $resource = "recebimentos/{$this->transacao->getCredencialCartao()}/tokens";

            $res = $client->request('POST', $resource, ['json' => $tokenItens, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->transacao->getChaveCartao()
            ]]);

            $result = json_decode((string)$res->getBody());
            return $result->token_cartao;

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);

        }
    }

}