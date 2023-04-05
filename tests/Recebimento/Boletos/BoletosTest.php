<?php

namespace PJBankTests\Recebimento\Boletos;

use PJBank\Recebimento;

class BoletosTest extends \PHPUnit\Framework\TestCase {

    public function testEmitirBoleto() {
        
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

        $this->assertIsObject($boleto);
        $this->assertTrue(property_exists($boleto, 'vencimento'));
        $this->assertTrue(property_exists($boleto, 'valor'));
        $this->assertTrue(property_exists($boleto, 'juros'));
        $this->assertTrue(property_exists($boleto, 'multa'));
        $this->assertTrue(property_exists($boleto, 'desconto'));
        $this->assertTrue(property_exists($boleto, 'nome_cliente'));
        $this->assertTrue(property_exists($boleto, 'cpf_cliente'));
        $this->assertTrue(property_exists($boleto, 'endereco_cliente'));
        $this->assertTrue(property_exists($boleto, 'numero_cliente'));
        $this->assertTrue(property_exists($boleto, 'complemento_cliente'));
        $this->assertTrue(property_exists($boleto, 'bairro_cliente'));
        $this->assertTrue(property_exists($boleto, 'cidade_cliente'));
        $this->assertTrue(property_exists($boleto, 'numero_cliente'));
        $this->assertTrue(property_exists($boleto, 'texto'));
        $this->assertTrue(property_exists($boleto, 'logo_url'));
        $this->assertTrue(property_exists($boleto, 'grupo'));
        $this->assertTrue(property_exists($boleto, 'link'));
        $this->assertTrue(property_exists($boleto, 'linha_digitavel'));
        $this->assertTrue(property_exists($boleto, 'id_unico'));
    }
}