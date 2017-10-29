<?php

namespace PJBank\ContaDigital\Administradores;

/**
 * Class AdministradoresManager
 * @author Matheus Mondenez <matheus.mondenez@superlogica.com>
 */
class AdministradoresManager
{
    /**
     * Credencial do Administrador
     * @var
     */
    private $credencial_conta;

    /**
     * Chave do Administrador
     * @var
     */
    private $chave_conta;
    
    /**
     * AdministradoresManager constructor
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_conta = $credencial;
        $this->chave_conta = $chave;
    }
    
    public function convidarAdministrador($email)
    {
        $administrador = new Administradores($this->credencial_conta, $this->chave_conta);
        $administrador->setEmail($email);
        $data = $administrador->convidar();
        
        return $data;
    }
    
    public function consultarStatusSocio($email)
    {
        $administrador = new Administradores($this->credencial_conta, $this->chave_conta);
        $data = $administrador->consultar($email);
        
        return $data;
    }
    
    public function removerAdministrador($email)
    {
        $administrador = new Administradores($this->credencial_conta, $this->chave_conta);
        $data = $administrador->remover($email);
        
        return $data;
    }
}