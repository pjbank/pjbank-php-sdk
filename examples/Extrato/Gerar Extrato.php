<?php

require_once "../../vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "1264e7bea04bb1c24b07ace759f64a1bd65c8560";
$chave = "ef947cf5867488f744b82744dd3a8fc4852e529f";

$PJBankRecebimentos = new Recebimento($credencial, $chave);

echo("Gerando o extrato somente com recebiments liquidados" . PHP_EOL);

$extrato = $PJBankRecebimentos->Extratos->NovoExtrato();
$extrato
    ->apenasPagos()
    ->gerar();


print_r($extrato->getItens());

echo("Gerando o extrato filtrado por data" . PHP_EOL);

$extrato = $PJBankRecebimentos->Extratos->NovoExtrato();
$extrato
    ->setDataInicio("06/01/2017")
    ->setDataFim("01/30/2017")
    ->gerar();


print_r($extrato->getItens());






