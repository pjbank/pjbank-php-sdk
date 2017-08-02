<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 01/08/17
 * Time: 15:23
 */

namespace PJBank\Boleto;

use PJBank\Boleto\Boleto;
use PJBank\Api\PJBankClient;


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
    public function __construct(Boleto $boleto) {
        $this->boleto = $boleto;
    }

    /**
     * Emite um boleto bancário via API
     * @return Boleto
     */
    public function emitir() {

        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();        
        $boletoItens = $this->boleto->getValues();

        $res = $client->request('POST','boleto', ['json' => $boletoItens, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CREDENCIAL' => $this->boleto->getCredencialBoleto(), 
                'X-CHAVE' => $this->boleto->getChaveBoleto()
                ]]);

        return json_decode((string) $res->getBody());
    }
}