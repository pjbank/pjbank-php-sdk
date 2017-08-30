<?php

namespace PJBank\ContaDigital\Subcontas;

/**
 * Class SubcontasManager
 * @author Matheus Mondenez <matheus.mondenez@superlogica.com>
 */
class SubcontasManager
{
    /**
     * Credencial da Subconta
     * @var
     */
    private $credencial_conta;

    /**
     * Chave da Subconta
     * @var
     */
    private $chave_conta;
    
    /**
     * SubcontasManager constructor
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_conta = $credencial;
        $this->chave_conta = $chave;
    }
    
    public function criarSubconta($nome_cartao, $data_nascimento, $sexo, $cep, $endereco, $numero, $bairro, $complemento, $cidade, $estado, $ddd, $telefone, $email, $produto, $valor, $documento)
    {
        $subconta = new Subconta($this->credencial_conta, $this->chave_conta);
        $subconta->setNomeCartao($nome_cartao);
        $subconta->setDataNascimento($data_nascimento);
        $subconta->setSexo($sexo);
        $subconta->setCEP($cep);
        $subconta->setEndereco($endereco);
        $subconta->setNumero($numero);
        $subconta->setBairro($bairro);
        $subconta->setComplemento($complemento);
        $subconta->setCidade($cidade);
        $subconta->setEstado($estado);
        $subconta->setDDD($ddd);
        $subconta->setTelefone($telefone);
        $subconta->setEmail($email);
        $subconta->setProduto($produto);
        $subconta->setValor($valor);
        $subconta->setDocumento($documento);
        $data = $subconta->criar();
        
        return $data;
    }
    
    public function consultarSubconta($tokenSubconta)
    {
        $subconta = new Subconta($this->credencial_conta, $this->chave_conta);
        $data = $subconta->consultar($tokenSubconta);
        
        return $data;
    }
    
    public function adicionarSaldoSubconta($tokenSubconta, $valor)
    {
        $subconta = new Subconta($this->credencial_conta, $this->chave_conta);
        $data = $subconta->adicionarSaldo($tokenSubconta, $valor);
        
        return $data;
    }
}
