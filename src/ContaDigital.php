<?php

namespace PJBank;

use PJBank\ContaDigital\Transacoes\TransacoesManager;
use PJBank\ContaDigital\Subcontas\SubcontasManager;
use PJBank\ContaDigital\Administradores\AdministradoresManager;
use PJBank\ContaDigital\Documentos\DocumentosManager;

class ContaDigital
{
    /**
     * Credencial informada na criação da conta
     * @var string
     */
    private $credencial;

    /**
     * Chave informada na criação da conta
     * @var null
     */
    private $chave;
    
    public $Transacoes;
    public $Subcontas;
    public $Administradores;
    public $Documentos;
    
    /**
     * PJBank constructor
     * @param string $credencial
     * @param string $chave
     */
    public function __construct($credencial = null, $chave = null)
    {
        $this->credencial = $credencial;
        $this->chave = $chave;

        // $this->constructorTransacao();
        $this->constructorSubconta();
        $this->constructorAdministrador();
        // $this->constructorDocumento();
    }
    
    /**
     * Constructor Transacoes
     */
    // private function constructorTransacao()
    // {
    //     $this->Transacoes = new TransacoesManager($this->credencial, $this->chave);
    // }
    
    /**
     * Constructor Subcontas
     */
    private function constructorSubconta()
    {
        $this->Subcontas = new SubcontasManager($this->credencial, $this->chave);
    }
    
    /**
     * Constructor Administradores
     */
    private function constructorAdministrador()
    {
        $this->Administradores = new AdministradoresManager($this->credencial, $this->chave);
    }
    
    /**
     * Constructor Documentos
     */
    // private function constructorDocumento()
    // {
    //     $this->Documentos = new DocumentosManager($this->credencial, $this->chave);
    // }
}
