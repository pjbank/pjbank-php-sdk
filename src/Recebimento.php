<?php

namespace PJBank;

use PJBank\Boleto\BoletosManager;
use PJBank\Cartao\CartaoManager;

/**
 * Class PJBank
 * @author Matheus Fidelis
 * @email matheus.fidelis@superlogica.com
 */
class Recebimento
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
     * Boleto Manager SDK
     * @var Boleto
     */
    public $Boletos;

    /**
     * Cartões Manager SDK
     * @var
     */
    public $Cartoes;

    /**
     * Conta Digital Manager SDk
     * @var
     */
    public $ContaDigital;


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
        $this->constructorCartao();
    }

    /**
     * Constructor de Transacoes de Cartão
     */
    public function constructorCartao() {
        $this->Cartoes = new CartaoManager($this->credencial, $this->chave);
    }

    /**
     * Constructor Boletos
     */
    public function constructorBoletos() {
        $this->Boletos = new BoletosManager($this->credencial, $this->chave);
    }



}