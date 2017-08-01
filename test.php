<?php

require_once "vendor/autoload.php";

use PJBank\PJBank;

$credencial = "minhacredencial";
$chave = "minhachave";

$PJBank = new PJBank($credencial, $chave);
$boleto = $PJBank->Boletos->NovoBoleto();

$boleto->setNomeCliente("Matheus Fidelis")
    ->setValor(10.50)
    ->setVencimento("09/01/2017")
    ->gerar();

print_r($boleto);