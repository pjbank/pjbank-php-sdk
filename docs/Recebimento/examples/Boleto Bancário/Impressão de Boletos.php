<?php

require_once "../../../../vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "6ef5e5c493f22ef42d1c052e069af5df3060c090";
$chave = "cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669";

$PJBankRecebimento = new Recebimento($credencial, $chave);

$lote =  $PJBankRecebimento->Boletos->Imprimir([
    "110",
    "443"
]);

print_r($lote);