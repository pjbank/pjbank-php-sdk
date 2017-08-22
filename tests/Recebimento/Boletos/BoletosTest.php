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

        $this->assertObjectHasAttribute('vencimento', $boleto);
        $this->assertObjectHasAttribute('valor', $boleto);
        $this->assertObjectHasAttribute('juros', $boleto);
        $this->assertObjectHasAttribute('multa', $boleto);
        $this->assertObjectHasAttribute('desconto', $boleto);
        $this->assertObjectHasAttribute('nome_cliente', $boleto);
        $this->assertObjectHasAttribute('cpf_cliente', $boleto);
        $this->assertObjectHasAttribute('endereco_cliente', $boleto);
        $this->assertObjectHasAttribute('numero_cliente', $boleto);
        $this->assertObjectHasAttribute('complemento_cliente', $boleto);
        $this->assertObjectHasAttribute('bairro_cliente', $boleto);
        $this->assertObjectHasAttribute('cidade_cliente', $boleto);
        $this->assertObjectHasAttribute('numero_cliente', $boleto);
        $this->assertObjectHasAttribute('texto', $boleto);
        $this->assertObjectHasAttribute('logo_url', $boleto);
        $this->assertObjectHasAttribute('grupo', $boleto);
        $this->assertObjectHasAttribute('link', $boleto);
        $this->assertObjectHasAttribute('linha_digitavel', $boleto);
        $this->assertObjectHasAttribute('id_unico', $boleto);
        

    }

}