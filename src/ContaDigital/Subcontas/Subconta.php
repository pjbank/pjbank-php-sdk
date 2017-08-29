<?php

namespace PJBank\ContaDigital\Subcontas;

/**
 * Class Subconta
 * @author Matheus Mondenez <matheus.mondenez@superlogica.com>
 */
class Subconta
{
    private $credencial_conta;
    private $chave_conta;
    public $nome_cartao;
    public $data_nascimento;
    public $sexo;
    public $email;
    public $produto;
    public $valor;
    public $documento;
    
    public function __construct($credencial, $chave)
    {
        $this->credencial_conta = $credencial;
        $this->chave_conta = $chave;
    }
    
    public function setNomeCartao($nome_cartao)
    {
        $this->nome_cartao = $nome_cartao;
        return $this;
    }
    
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }
    
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    public function setProduto($produto)
    {
        $this->produto = $produto;
        return $this;
    }
    
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }
    
    public function setDocumento($documento)
    {
        $this->documento = $documento;
        return $this;
    }
    
    public function getNomeCartao()
    {
        return $this->nome_cartao;
    }
    
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }
    
    public function getSexo()
    {
        return $this->sexo;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getProduto()
    {
        return $this->produto;
    }
    
    public function getValor()
    {
        return $this->valor;
    }
    
    public function getDocumento()
    {
        return $this->documento;
    }
    
    public function getCredencialConta()
    {
        return $this->credencial_conta;
    }
    
    public function getChaveConta()
    {
        return $this->chave_conta;
    }
    
    public function getValues()
    {
        $objectValues = get_object_vars($this);
        $subcontasValues = array();
        foreach ($objectValues as $key => $value) {
            if (!is_null($value)) {
                $subcontasValues[$key] = $value;
            }
        }

        return $subcontasValues;
    }
    
    public function criar()
    {
        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();
        
        $tokenItens = $this->getValues();

        try {

            $resource = "contadigital/{$this->getCredencialConta()}/subcontas";

            $res = $client->request('POST', $resource, [
                'json' => $tokenItens, 'headers' => [
                    'Content-Type' => 'Application/json',
                    'X-CHAVE-CONTA' => $this->getChaveConta()
                ]
            ]);

            $result = json_decode((string)$res->getBody());
            return $result->data;

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);

        }
    }
}
