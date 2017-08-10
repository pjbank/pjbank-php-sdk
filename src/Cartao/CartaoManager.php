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

    /**
     * Tokeniza um cartão para sua conta
     * @param $array
     * @return mixed
     */
    public function Tokenizar($array) {

        $transacao = new Transacao($this->credencial_cartao, $this->chave_cartao);

        $transacao->setAnoVencimento($array['ano_vencimento'])
            ->setMesVencimento($array['mes_vencimento'])
            ->setCVV($array['codigo_cvv'])
            ->setNumeroCartao($array['numero_cartao'])
            ->setNomeCartao($array['nome_cartao'])
            ->setCPF($array['cpf_cartao'])
            ->tokenizar();

        return $transacao->getTokenCartao();

    }

}