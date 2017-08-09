<?php

namespace PJBank\Cartao;

/**
 * Class Cancelamento
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Cartao
 */
class Cancelamento
{
    /**
     * Credencial da conta de cartão
     * @var
     */
    private $credencial_cartao;

    /**
     * Chave da conta de cartão
     * @var
     */
    private $chave_cartao;

    /**
     * Cancelamento constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_cartao = $credencial;
        $this->chave_cartao = $chave;
    }

    /**
     * Cancela uma transação de cartão de crédito
     * @param $tid
     */
    public function cancelarTransacao($tid)
    {

    }

}