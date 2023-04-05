# pjbank-php-sdk
PJBank SDK para PHP!  :elephant: :elephant: :elephant:

[![Build Status](https://travis-ci.org/pjbank/pjbank-php-sdk.svg?branch=master)](http://travis-ci.org/pjbank/pjbank-php-sdk)


# SDK da API de Recebimento do PJBank

* Exemplos em Docs

## Instalação


```bash
$ composer require pjbank/pjbank-sdk-php
```

## Boleto bancário

### Emitindo um boleto bancário

```php
require_once "./vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "6ef5e5c493f22ef42d1c052e069af5df3060c090";
$chave = "cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669";


$PJBankRecebimentos = new Recebimento($credencial, $chave);
$boleto = $PJBankRecebimentos->Boletos->NovoBoleto();


$boleto->setNomeCliente("Matheus Fidelis")
    ->setCpfCliente("29454730000144")
    ->setValor(10.50)
    ->setVencimento("09/01/2017")
    ->setPedidoNumero(rand(0, 999))
    ->gerar();


print_r($boleto->getNossoNumero() . PHP_EOL);
print_r($boleto->getLink() .  PHP_EOL);
print_r($boleto->getPedidoNumero() . PHP_EOL);

```


### Impressão de boletos

> Você pode especificar vários boletos identificados pelo `pedido_numero` para gerar uma impressão em lote.


```php

require_once "./vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "6ef5e5c493f22ef42d1c052e069af5df3060c090";
$chave = "cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669";

$PJBankRecebimento = new Recebimento($credencial, $chave);

$lote =  $PJBankRecebimento->Boletos->Imprimir([
    "110",
    "443"
]);

print_r($lote);

```


## Cartão de Crédito

### Gerando um pagamento de cartão de crédito com os dados do cartão

```php

require_once "./vendor/autoload.php";

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

```

### Gerando um pagamento de cartão de crédito com Token

> Após o primeiro pagamento, um `token_cartao` será gerado. Use este token para pagar de forma segura nas próximas vezes conforme as recomendações do PCI

```php

require_once "./vendor/autoload.php";

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

```

### Cancelando uma transação de cartão

> Todo pagamento via cartão retorna um parâmetro chamado `tid`. Esse parâmetro equivale ao identificador da transação entre o PJBank e as adquirentes. 

```php

require_once "./vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "1264e7bea04bb1c24b07ace759f64a1bd65c8560";
$chave = "ef947cf5867488f744b82744dd3a8fc4852e529f";

$PJBankRecebimentos = new Recebimento($credencial, $chave);

//Gerando uma transação de exemplo
$transacao = $PJBankRecebimentos->Cartoes->NovaTransacao();

$transacao->setNumeroCartao("4012001037141112")
    ->setValor(1.00)
    ->setTokenCartao("d30e4fc83e153ffb113af7e7c736f4bb5004c552")
    ->setDescricao("Pagamento de exemplo com Token")
    ->gerar();


//Cancelamento a transação criada
$cancelamento = $PJBankRecebimentos->Cartoes->CancelarTransacao($transacao->getTid());

print_r($cancelamento);

```

### Tokenizando um cartão

> No primeiro pagamento com os dados do Cartão, o parâmetro `token_cartao` será retornado. Mas há casos onde o usuário não vai efetuar a compra no momento da captura dos dados, e por segurança não é recomendado armazenar os mesmos. Para resolver esse problema, você pode enviar os dados recém capturados para a API e trocar os mesmos por um token do cartão.

```php

use PJBank\Recebimento;

$credencial = "1264e7bea04bb1c24b07ace759f64a1bd65c8560";
$chave = "ef947cf5867488f744b82744dd3a8fc4852e529f";

$PJBankRecebimentos = new Recebimento($credencial, $chave);

/**
 * Array de exemplo com os dados do cartão
 */
$dadosCartao = array(
    "nome_cartao" =>  "Cliente Exemplo",
    "numero_cartao" => "4012001037141112",
    "mes_vencimento" => 05,
    "ano_vencimento" => 2018,
    "cpf_cartao" => "64111456529",
    "email_cartao" => "api@pjbank.com.br",
    "celular_cartao" => "978456723",
    "codigo_cvv" => 123
);

$token = $PJBankRecebimentos->Cartoes->Tokenizar($dadosCartao);

print_r($token);

```

## Extrato

### Extrato simples

> Gerando um extrato da conta sem filtros.

```php
require_once "./vendor/autoload.php";

use PJBank\Recebimento;

$credencial = "1264e7bea04bb1c24b07ace759f64a1bd65c8560";
$chave = "ef947cf5867488f744b82744dd3a8fc4852e529f";

$PJBankRecebimentos = new Recebimento($credencial, $chave);

echo("Gerando o extrato bancário da conta sem filtros" . PHP_EOL);

$extrato = $PJBankRecebimentos->Extratos->NovoExtrato();
$extrato->gerar();

print_r($extrato->getItens());
```

### Extrato - Listando somente as cobranças liquidadas

> Gerando um extrato somente com os itens que foram pagos 

```php

$extrato = $PJBankRecebimentos->Extratos->NovoExtrato();
$extrato->apenasPagos()
    ->gerar();

print_r($extrato->getItens());
```

### Extrato - Filtro por data

> Você pode inserir um filtro por um intervalo de datas no extrato. As datas devem ser informadas no formato MM/DD/AAAA

```php

$extrato = $PJBankRecebimentos->Extratos->NovoExtrato();
$extrato
    ->setDataInicio("06/01/2017")
    ->setDataFim("06/30/2017")
    ->gerar();

print_r($extrato->getItens());
```