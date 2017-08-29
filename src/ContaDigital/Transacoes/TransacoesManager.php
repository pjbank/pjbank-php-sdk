<?php

namespace PJBank\ContaDigital\Transacoes;

/**
 * Class SubcontasManager
 * @author Matheus Mondenez <matheus.mondenez@superlogica.com>
 */
class TransacoesManager
{
    /**
     * Credencial da Transacao
     * @var
     */
    private $credencial_transacao;

    /**
     * Chave da Transacao
     * @var
     */
    private $chave_transacao;
    
    /**
     * TransacoesManager constructor
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_transacao = $credencial;
        $this->chave_transacao = $chave;
    }
}