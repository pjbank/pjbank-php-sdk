<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 01/08/17
 * Time: 15:23
 */

namespace PJBank\Boleto;

use PJBank\Boleto;
use PJBank\Api\PJBankClient;

class Emissor
{

    public function emitir(Boleto $boleto) {

        $client = new PJBankClient();

    }
}