<?php

namespace PJBank\ContaDigital\Subcontas;

use PJBank\Api\PJBankClient;

/**
 * Class Subconta
 * @author Matheus Mondenez <matheus.mondenez@superlogica.com>
 */
class Subconta
{
    private $credencial_conta;
    private $chave_conta;
    private $nome_cartao;
    private $data_nascimento;
    private $sexo;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $complemento;
    private $cidade;
    private $estado;
    private $ddd;
    private $telefone;
    private $email;
    private $produto;
    private $valor;
    private $documento;
    
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
    
    public function setCEP($cep)
    {
        $this->cep = $cep;
        return $this;
    }
    
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }
    
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }
    
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }
    
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }
    
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }
    
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }
    
    public function setDDD($ddd)
    {
        $this->ddd = $ddd;
        return $this;
    }
    
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
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
    
    public function getCEP()
    {
        return $this->cep;
    }
    
    public function getEndereco()
    {
        return $this->endereco;
    }
    
    public function getNumero()
    {
        return $this->numero;
    }
    
    public function getBairro()
    {
        return $this->bairro;
    }
    
    public function getComplemento()
    {
        return $this->complemento;
    }
    
    public function getCidade()
    {
        return $this->cidade;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }
    
    public function getDDD()
    {
        return $this->ddd;
    }
    
    public function getTelefone()
    {
        return $this->telefone;
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
                'json' => $tokenItens, 
                'headers' => [
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
    
    public function consultar($tokenSubconta)
    {
        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();        
        $tokenItens = $this->getValues();
        
        try {
            $resource = "contadigital/{$this->getCredencialConta()}/subcontas/{$tokenSubconta}";

            $res = $client->request('GET', $resource, [
                'headers' => [
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
    
    public function adicionarSaldo($tokenSubconta, $valor)
    {
        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();
        $valorBoleto['valor'] = $valor;
        
        try {
            $resource = "contadigital/{$this->getCredencialConta()}/subcontas/{$tokenSubconta}";
        
            $res = $client->request('POST', $resource, [
                'json' => $valorBoleto, 
                'headers' => [
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
