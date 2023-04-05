<?php

// namespace PJBankTests\ContaDigital\Subcontas;

// use PJBank\ContaDigital;

// class SubContasTest extends \PHPUnit\Framework\TestCase
// {
//     public function testCriarSubconta()
//     {
//         $credencial = "eb2af021c5e2448c343965a7a80d7d090eb64164";
//         $chave = "a834d47e283dd12f50a1b3a771603ae9dfd5a32c";
        
//         $PJBankContaDigital = new ContaDigital($credencial, $chave);
//         $subconta = $PJBankContaDigital->Subcontas->criarSubconta(
//             'Cliente Exemplo',
//             '11/01/1990',
//             'M',
//             '13032385',
//             'Rua Joaquim Vilac',
//             '509',
//             'Vila Teixeira',
//             'Complemento Teste',
//             'Campinas',
//             'SP',
//             '19',
//             '40096800',
//             'api@pjbank.com.br',
//             'Caixinha',
//             25.00,
//             '07727876208'
//         );
        
//         $this->assertObjectHasAttribute('nosso_numero', $subconta);
//         $this->assertObjectHasAttribute('link_boleto', $subconta);
//         $this->assertObjectHasAttribute('linha_digitavel', $subconta);
//         $this->assertObjectHasAttribute('token_cartao', $subconta);
//         $this->assertObjectHasAttribute('numero_cartao', $subconta);
//     }
    
//     public function testConsultarSubconta()
//     {
//         $credencial = "eb2af021c5e2448c343965a7a80d7d090eb64164";
//         $chave = "a834d47e283dd12f50a1b3a771603ae9dfd5a32c";
//         $tokenSubconta = "b2240b16b373446935a2a7ab437577a823f22eaa";
        
//         $PJBankContaDigital = new ContaDigital($credencial, $chave);
//         $subconta = $PJBankContaDigital->Subcontas->consultarSubconta($tokenSubconta);
        
//         $this->assertObjectHasAttribute('nome_cartao', $subconta);
//         $this->assertObjectHasAttribute('documento', $subconta);
//         $this->assertObjectHasAttribute('email', $subconta);
//         $this->assertObjectHasAttribute('data_inicio', $subconta);
//         $this->assertObjectHasAttribute('data_bloqueio', $subconta);
//         $this->assertObjectHasAttribute('cep', $subconta);
//         $this->assertObjectHasAttribute('endereco', $subconta);
//         $this->assertObjectHasAttribute('numero', $subconta);
//         $this->assertObjectHasAttribute('bairro', $subconta);
//         $this->assertObjectHasAttribute('complemento', $subconta);
//         $this->assertObjectHasAttribute('cidade', $subconta);
//         $this->assertObjectHasAttribute('estado', $subconta);
//         $this->assertObjectHasAttribute('numero_cartao', $subconta);
//         $this->assertObjectHasAttribute('telefone', $subconta);
//         $this->assertObjectHasAttribute('status_cartao', $subconta);
//         $this->assertObjectHasAttribute('nm_boletos_carga_pendentes', $subconta);
//     }
    
//     public function testAdicionarSaldo()
//     {
//         $credencial = "eb2af021c5e2448c343965a7a80d7d090eb64164";
//         $chave = "a834d47e283dd12f50a1b3a771603ae9dfd5a32c";
//         $tokenSubconta = "b2240b16b373446935a2a7ab437577a823f22eaa";
        
//         $PJBankContaDigital = new ContaDigital($credencial, $chave);
//         $subconta = $PJBankContaDigital->Subcontas->adicionarSaldoSubconta($tokenSubconta, 50);
        
//         $this->assertObjectHasAttribute('nosso_numero', $subconta);
//         $this->assertObjectHasAttribute('link_boleto', $subconta);
//         $this->assertObjectHasAttribute('linha_digitavel', $subconta);
//     }
// }
