<?php

namespace PJBank\Cartao;

/**
 * Class CartaoManager
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Cartao
 */
class CartaoManager
{

    /**
     * Credencial da Conta de Cartão
     * @var
     */
    private $credencial_cartao;

    /**
     * Chave de uma Conta de Cartão
     * @var
     */
    private $chave_cartao;

    /**
     * CartaoManager constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_cartao = $credencial;
        $this->chave_cartao = $chave;
    }

    /**
     * Cria uma nova transação de cartão de crédito
     * @return \Transacao
     */
    public function NovaTransacao()
    {
        return new Transacao($this->credencial_cartao, $this->chave_cartao);
    }

    /**
     * Cancela uma transaçao de cartão de crédito
     * @param $tid ID da transação
     * @return bool
     */
    public function CancelarTransacao($tid)
    {
        $cancelamento = new Cancelamento($this->credencial_cartao, $this->chave_cartao);
        return $cancelamento->cancelarTransacao($tid);
    }

}