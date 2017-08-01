<?php

namespace PJBank\Api;

/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 01/08/17
 * Time: 15:13
 */
class PJBankClient extends Api
{

    private $headers = array();

    public function __construct($credencial, $chave)
    {
        array_push($this->headers, ["X-CHAVE" => $chave, "X-CREDENCIAL" => $credencial]);
    }

}