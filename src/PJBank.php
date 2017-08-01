<?php

namespace PJBank;

use PJBank\Boleto\BoletosManager;

/**
 * Class PJBank
 * @author Matheus Fidelis
 * @email matheus.fidelis@superlogica.com
 */
class PJBank
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

    /**
     *
     * @var Boleto
     */
    public $Boletos;

    /**
     * PJBank constructor
     * @param string $credencial
     * @param string $chave
     */
    public function __construct($credencial = null, $chave = null)
    {
        $this->credencial = $credencial;
        $this->chave = $chave;

        $this->constructorBoletos();
    }

    public function constructorCartao() {

    }

    public function constructorBoletos() {
        $this->Boletos = new BoletosManager($this->credencial, $this->chave);
    }

    /**
     * Gera um novo boleto
     * @return Boleto
     */
    public function NovoBoleto() {
        return (new \Boleto($this->credencial, $this->chave));
    }

    /**
     *
     */
    public function Cartao() {
        return (new \Transacao($this->credencial, $this->chave));
    }


}