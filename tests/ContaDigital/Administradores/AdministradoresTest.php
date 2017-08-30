<?php

namespace PJBankTests\ContaDigital\Administradores;

use PJBank\ContaDigital;

class AdministradoresTest extends \PHPUnit\Framework\TestCase
{
    public function testConvidarAdministrador()
    {
        $credencial = "eb2af021c5e2448c343965a7a80d7d090eb64164";
        $chave = "a834d47e283dd12f50a1b3a771603ae9dfd5a32c";
        
        $PJBankContaDigital = new ContaDigital($credencial, $chave);
        $statusResponse = $PJBankContaDigital->Administradores->convidarAdministrador('api@pjbank.com.br');
        
        $this->assertEquals('200', $statusResponse);
    }
    
    public function testConsultarStatusSocio()
    {
        $credencial = "eb2af021c5e2448c343965a7a80d7d090eb64164";
        $chave = "a834d47e283dd12f50a1b3a771603ae9dfd5a32c";
        
        $PJBankContaDigital = new ContaDigital($credencial, $chave);
        $administrador = $PJBankContaDigital->Administradores->consultarStatusSocio('api@pjbank.com.br');
        
        $this->assertObjectHasAttribute('statusVinculo', $administrador);
        $this->assertObjectHasAttribute('msg', $administrador);
    }
    
    public function testRemoverAdministrador()
    {
        $credencial = "eb2af021c5e2448c343965a7a80d7d090eb64164";
        $chave = "a834d47e283dd12f50a1b3a771603ae9dfd5a32c";
        
        $PJBankContaDigital = new ContaDigital($credencial, $chave);
        $administrador = $PJBankContaDigital->Administradores->removerAdministrador('api@pjbank.com.br');
        
        print_r($administrador);
        // $this->assertObjectHasAttribute('staus', $administrador);
        // $this->assertObjectHasAttribute('msg', $administrador);
    }
}