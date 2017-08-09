<?php

require_once "../../vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "1264e7bea04bb1c24b07ace759f64a1bd65c8560";
$chave = "ef947cf5867488f744b82744dd3a8fc4852e529f";

$PJBankRecebimentos = new Recebimento($credencial, $chave);

//Gera um novo extrato
$extrato = $PJBankRecebimentos->Extratos->NovoExtrato();
$extrato
    ->apenasPagos()
    ->gerar();

print_r($extrato->getItens());



