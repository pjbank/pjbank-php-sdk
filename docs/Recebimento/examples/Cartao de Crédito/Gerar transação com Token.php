<?php

require_once "../../../../vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "1264e7bea04bb1c24b07ace759f64a1bd65c8560";
$chave = "ef947cf5867488f744b82744dd3a8fc4852e529f";

$PJBankRecebimentos = new Recebimento($credencial, $chave);

$transacao = $PJBankRecebimentos->Cartoes->NovaTransacao();

//Pagando com os token gerado pelo PJBank!
$transacao->setNumeroCartao("4012001037141112")
    ->setValor(1.00)
    ->setTokenCartao("d30e4fc83e153ffb113af7e7c736f4bb5004c552")
    ->setDescricao("Pagamento de exemplo com Token")
    ->gerar();

print_r($transacao->getValues());

