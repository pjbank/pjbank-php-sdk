<?php

namespace PJBankTests\ContaDigital\Subcontas;

use PJBank\ContaDigital;

class SubContasTest extends \PHPUnit\Framework\TestCase
{        
    public function testCriarSubconta()
    {
        $credencial = "eb2af021c5e2448c343965a7a80d7d090eb64164";
        $chave = "a834d47e283dd12f50a1b3a771603ae9dfd5a32c";
        
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
        
        $this->assertObjectHasAttribute('nosso_numero', $subconta);
        $this->assertObjectHasAttribute('link_boleto', $subconta);
        $this->assertObjectHasAttribute('linha_digitavel', $subconta);
        $this->assertObjectHasAttribute('token_cartao', $subconta);
        $this->assertObjectHasAttribute('numero_cartao', $subconta);
    }
}