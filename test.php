<?php

require_once "vendor/autoload.php";

use PJBank\PJBank;

$credencial = "7060dd811aa15ae53dfa942f14ead9bc5398e4e8";
$chave = "81cab8d3c801980852b0e11a29d466534adafd58";

$PJBank = new PJBank($credencial, $chave);
$boleto = $PJBank->Boletos->NovoBoleto();

$boleto->setNomeCliente("Matheus Fidelis")
    ->setCpfCliente("29454730000144")
    ->setValor(10.50)
    ->setVencimento("09/01/2017")
    ->gerar();

print_r($boleto->getLink());
