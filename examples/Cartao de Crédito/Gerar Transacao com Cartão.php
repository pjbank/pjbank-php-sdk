<?php

require_once "../../vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "1264e7bea04bb1c24b07ace759f64a1bd65c8560";
$chave = "ef947cf5867488f744b82744dd3a8fc4852e529f";

$PJBankRecebimentos = new Recebimento($credencial, $chave);

$transacao = $PJBankRecebimentos->Cartoes->NovaTransacao();

//Pagando com os dados do cartão
$transacao->setNumeroCartao("4012001037141112")
    ->setNomeCartao("Cliente de Exemplo")
    ->setMesVencimento("05")
    ->setAnoVencimento("2018")
    ->setCPF("24584548000194")
    ->setEmail("api@pjbank.com.br")
    ->setCVV("123")
    ->setValor("1.00")
    ->setParcelas(1)
    ->setDescricao("Pagamento de exemplo")
    ->gerar();

print_r($transacao->getValues());

