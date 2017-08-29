<?php

namespace PJBankTests\ContaDigital\Subcontas;

use PJBank\ContaDigital;

class SubContasTest extends \PHPUnit\Framework\TestCase
{
    // public function testTrue()
    // {
    //     $this->assertTrue(true);
    // }
        
    public function testCriarSubconta()
    {
        $credencial = "6ef5e5c493f22ef42d1c052e069af5df3060c090";
        $chave = "cfeb3e01f0d7d2217fc5f522f73c67ea56e5a669";
        
        $PJBankContaDigital = new ContaDigital($credencial, $chave);        
        $subconta = $PJBankContaDigital->Subcontas->criarSubconta(
            'Matheus Mondenez', 
            '11/01/1993', 
            'M', 
            '13032385',
            'Rua Joaquim Vilac',
            '509',
            'Vila Teixeira',
            'Complemento Teste',
            'Campinas',
            'SP',
            '19',
            '40096800',
            'matheus.mondenez@superlogica.com', 
            'Caixinha', 
            25.00, 
            '74171377927'
        );
        
        print_r($subconta);
        
        $this->assertObjectHasAttribute('nosso_numero', $subconta);
        $this->assertObjectHasAttribute('link_boleto', $subconta);
        $this->assertObjectHasAttribute('linha_digitavel', $subconta);
        $this->assertObjectHasAttribute('token_cartao', $subconta);
        $this->assertObjectHasAttribute('numero_cartao', $subconta);
    }
}