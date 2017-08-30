<?php

namespace PJBank\ContaDigital\Administradores;

use PJBank\Api\PJBankClient;

class Administradores
{
    private $credencial_conta;
    private $chave_conta;
    private $email;
    
    public function __construct($credencial, $chave)
    {
        $this->credencial_conta = $credencial;
        $this->chave_conta = $chave;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getCredencialConta()
    {
        return $this->credencial_conta;
    }
    
    public function getChaveConta()
    {
        return $this->chave_conta;
    }
    
    public function convidar()
    {
        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();
        $param['email'] = $this->email;
        
        try {
            $resource = "contadigital/{$this->getCredencialConta()}/administradores";
        
            $res = $client->request('POST', $resource, [
                'json' => $param,
                'headers' => [
                    'Content-Type' => 'Application/json',
                    'X-CHAVE-CONTA' => $this->getChaveConta()
                ]
            ]);
        
            $result = json_decode((string)$res->getBody());
            return $result->status;
        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);
        }
    }
    
    public function consultar($email)
    {
        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();
        
        try {
            $resource = "contadigital/{$this->getCredencialConta()}/administradores/{$email}";
        
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
    
    public function remover($email)
    {
        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();
        
        try {
            $resource = "contadigital/{$this->getCredencialConta()}/administradores/{$email}";
        
            $res = $client->request('DELETE', $resource, [
                'headers' => [
                    'Content-Type' => 'Application/json',
                    'X-CHAVE-CONTA' => $this->getChaveConta()
                ]
            ]);
        
            $result = json_decode((string)$res->getBody());
            return $result;
        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);
        }
    }
}
