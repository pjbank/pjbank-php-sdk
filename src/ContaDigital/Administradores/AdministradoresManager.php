<?php

namespace PJBank\ContaDigital\Administradores;

/**
 * Class SubcontasManager
 * @author Matheus Mondenez <matheus.mondenez@superlogica.com>
 */
class AdministradoresManager
{
    /**
     * Credencial do Administrador
     * @var
     */
    private $credencial_administrador;

    /**
     * Chave do Administrador
     * @var
     */
    private $chave_administrador;
    
    /**
     * AdministradoresManager constructor
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_administrador = $credencial;
        $this->chave_administrador = $chave;
    }
}