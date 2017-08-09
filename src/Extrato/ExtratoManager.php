<?php

namespace PJBank\Extrato;

/**
 * Class ExtratoManager
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Extrato
 */
class ExtratoManager
{

    /**
     * Credencial da Conta
     * @var
     */
    private $credencial_conta;

    /**
     * Chave da conta
     * @var
     */
    private $chave_conta;

    /**
     * ExtratoManager constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_conta = $credencial;
        $this->chave_conta = $chave;
    }

    /**
     * Retorna uma nova instância de um extrato
     * @return Extrato
     */
    public function NovoExtrato() {
        return new Extrato($this->credencial_conta, $this->chave_conta);
    }

}