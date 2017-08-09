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
     * Undocumented variable*
     * @var [type]
     */
    private $boleto;

    /**
     * Undocumented function
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

        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();        
        $boletoItens = $this->boleto->getValues();

        try {

            $resource = "recebimento/{$this->boleto->getCredencialBoleto()}/transacoes";

            $res = $client->request('POST',  $resource, ['json' => $boletoItens, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->boleto->getChaveBoleto()
            ]]);

            return json_decode((string) $res->getBody());

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            print_r($responseBody); die();
            throw new \Exception($responseBody->msg, $responseBody->status);

        }



    }
}