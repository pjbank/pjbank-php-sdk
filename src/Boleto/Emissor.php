<?php

namespace PJBank\Boleto;

use PJBank\Api\PJBankClient;

use GuzzleHttp\Exception\ClientException;

/**
 * Class Emissor de Boletos no PJBank
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Boleto
 */
class Emissor
{

    /**
     * @var Boleto
     */
    private $boleto;

    /**
     * Emissor constructor.
     * @param Boleto $boleto
     */
    public function __construct(Boleto $boleto)
    {
        $this->boleto = $boleto;
    }

    /**
     * Emite um boleto bancário via API
     * @return Boleto
     */
    public function emitir()
    {

        $PJBankClient = new PJBankClient($this->boleto->getSandbox());
        $client = $PJBankClient->getClient();
        $boletoItens = $this->boleto->getValues();

        try {

            $resource = "recebimentos/{$this->boleto->getCredencialBoleto()}/transacoes";

            $res = $client->request('POST',  $resource, ['json' => $boletoItens, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->boleto->getChaveBoleto()
            ]]);

            return json_decode((string) $res->getBody());

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);

        }

    }

    /**
     * Consulta uma transação via API
     * @return array
     */
    public function consultar($id_unico)
    {
        $PJBankClient = new PJBankClient($this->boleto->getSandbox());
        $client = $PJBankClient->getClient();

        try {
            $resource = "recebimentos/{$this->boleto->getCredencialBoleto()}/transacoes/$id_unico";

            $res = $client->request('GET',  $resource, [
                'headers' => [
                    'Content-Type' => 'Application/json',
                    'X-CHAVE' => $this->boleto->getChaveBoleto()
                ]
            ]);

            $response = json_decode((string) $res->getBody(), true);
            if(array_key_exists(0, $response)) {
                return $response[0];
            }
            else {
                return $response;
            }

        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);
        }
    }

    /**
     * Invalida um boleto bancário via API
     * @return string
     */
    public function invalidar()
    {
        $PJBankClient = new PJBankClient($this->boleto->getSandbox());
        $client = $PJBankClient->getClient();

        try {
            $resource = "recebimentos/{$this->boleto->getCredencialBoleto()}/transacoes/{$this->boleto->getPedidoNumero()}";

            $res = $client->request('DELETE',  $resource, [
                'headers' => [
                    'Content-Type' => 'Application/json',
                    'X-CHAVE' => $this->boleto->getChaveBoleto()
                ]
            ]);

            return json_decode((string) $res->getBody());

        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);
        }
    }
}
