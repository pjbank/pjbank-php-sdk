<?php

namespace PJBank\Cartao;
use GuzzleHttp\Exception\ClientException;

/**
 * Class Transacao
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Cartao
 */
class Transacao
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
     * Numero do cartão
     * @var
     */
    private $numero_cartao;

    /**
     * Nome impresso no cartão
     * @var
     */
    private $nome_cartao;

    /**
     * Mês vencimento do cartão
     * @var
     */
    private $mes_vencimento;

    /**
     * Ano vencimento do cartão
     * @var
     */
    private $ano_vencimento;

    /**
     * CPF vencimento do cartão
     * @var
     */
    private $cpf_cartao;

    /**
     * E-mail de contato do cartão
     * @var
     */
    private $email_cartao;

    /**
     * Telefone de contato do cartão
     * @var
     */
    private $celular_cartao;

    /**
     * Código de segurança do cartão
     * @var
     */
    private $codigo_cvv;

    /**
     * Valor da transação
     * @var
     */
    private $valor;

    /**
     * Numero de parcelas do pagamento
     * @var
     */
    private $parcelas;

    /**
     * Descrição opcional do pagamento
     * @var
     */
    private $descricao_pagamento;

    /**
     * Cartão Tokenizado
     * @var
     */
    private $token_cartao;

    /**
     * Numero da transacao aprovada
     * @var
     */
    private $tid;

    /**
     * Tarifa
     * @var
     */
    private $tarifa;

    /**
     * Taxa da transacao
     * @var
     */
    private $taxa;

    /**
     * Id da transacao para conciliacao
     * @var
     */
    private $tid_conciliacao;

    /**
     * Bandeira do cartão
     * @var
     */
    private $bandeira;

    /**
     * Numero da autorizacao
     * @var
     */
    private $autorizacao;

    /**
     * Cartao trucado.
     * Pode ser armazenado para identificacão visual
     * @var
     */
    private $cartao_truncado;

    /**
     * Data da previsao de credito no formato MM/DD/AAA
     * @var
     */
    private $previsao_credito;

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
     * @return mixed
     */
    public function getCredencialCartao()
    {
        return $this->credencial_cartao;
    }


    /**
     * @return mixed
     */
    public function getChaveCartao()
    {
        return $this->chave_cartao;
    }


    /**
     * @return mixed
     */
    public function getNumeroCartao()
    {
        return $this->numero_cartao;
    }

    /**
     * @param mixed $numero_cartao
     * @return Transacao
     */
    public function setNumeroCartao($numero_cartao)
    {
        $this->numero_cartao = $numero_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeCartao()
    {
        return $this->nome_cartao;
    }

    /**
     * @param mixed $nome_cartao
     * @return Transacao
     */
    public function setNomeCartao($nome_cartao)
    {
        $this->nome_cartao = $nome_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMesVencimento()
    {
        return $this->mes_vencimento;
    }

    /**
     * @param mixed $mes_vencimento
     * @return Transacao
     */
    public function setMesVencimento($mes_vencimento)
    {
        $this->mes_vencimento = $mes_vencimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnoVencimento()
    {
        return $this->ano_vencimento;
    }

    /**
     * @param mixed $ano_vencimento
     * @return Transacao
     */
    public function setAnoVencimento($ano_vencimento)
    {
        $this->ano_vencimento = $ano_vencimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCPF()
    {
        return $this->cpf_cartao;
    }

    /**
     * @param mixed $cpf_cartao
     * @return Transacao
     */
    public function setCPF($cpf_cartao)
    {
        $this->cpf_cartao = $cpf_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email_cartao;
    }

    /**
     * @param mixed $email_cartao
     * @return Transacao
     */
    public function setEmail($email_cartao)
    {
        $this->email_cartao = $email_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular_cartao;
    }

    /**
     * @param mixed $celular_cartao
     * @return Transacao
     */
    public function setCelular($celular_cartao)
    {
        $this->celular_cartao = $celular_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCVV()
    {
        return $this->codigo_cvv;
    }

    /**
     * @param mixed $codigo_cvv
     * @return Transacao
     */
    public function setCVV($codigo_cvv)
    {
        $this->codigo_cvv = $codigo_cvv;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     * @return Transacao
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * @param mixed $parcelas
     * @return Transacao
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao_pagamento;
    }

    /**
     * @param mixed $descricao_pagamento
     * @return Transacao
     */
    public function setDescricao($descricao_pagamento)
    {
        $this->descricao_pagamento = $descricao_pagamento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTokenCartao()
    {
        return $this->token_cartao;
    }

    /**
     * @param mixed $token_cartao
     * @return Transacao
     */
    public function setTokenCartao($token_cartao)
    {
        $this->token_cartao = $token_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @param mixed $tid
     */
    protected function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarifa()
    {
        return $this->tarifa;
    }

    /**
     * @param mixed $tarifa
     */
    protected function setTarifa($tarifa)
    {
        $this->tarifa = $tarifa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxa()
    {
        return $this->taxa;
    }

    /**
     * @param mixed $taxa
     */
    protected function setTaxa($taxa)
    {
        $this->taxa = $taxa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTidConciliacao()
    {
        return $this->tid_conciliacao;
    }

    /**
     * @param mixed $tid_conciliacao
     */
    protected function setTidConciliacao($tid_conciliacao)
    {
        $this->tid_conciliacao = $tid_conciliacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBandeira()
    {
        return $this->bandeira;
    }

    /**
     * @param mixed $bandeira
     */
    protected function setBandeira($bandeira)
    {
        $this->bandeira = $bandeira;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutorizacao()
    {
        return $this->autorizacao;
    }

    /**
     * @param mixed $autorizacao
     */
    protected function setAutorizacao($autorizacao)
    {
        $this->autorizacao = $autorizacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoTruncado()
    {
        return $this->cartao_truncado;
    }

    /**
     * @param mixed $cartao_truncado
     */
    protected function setCartaoTruncado($cartao_truncado)
    {
        $this->cartao_truncado = $cartao_truncado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrevisaoCredito()
    {
        return $this->previsao_credito;
    }

    /**
     * @param mixed $previsao_credito
     */
    protected function setPrevisaoCredito($previsao_credito)
    {
        $this->previsao_credito = $previsao_credito;
        return $this;
    }


    /**
     * Retorna os atributos preenchidos da Transacao de Cartão de Crédito
     * @return array
     */
    public function getValues()
    {
        $objectValues = get_object_vars($this);
        $transacaoValues = array();
        foreach ($objectValues as $key => $value) {
            if (!is_null($value)) {
                $transacaoValues[$key] = $value;
            }
        }

        return $transacaoValues;
    }

    /**
     * Gera uma transacao de cartão de crédito
     */
    public function gerar() {

        $maquininha = new Maquininha($this);

        try {
            $transacaoGerada = $maquininha->transmitir();

            $this->setTokenCartao($transacaoGerada->token_cartao);
            $this->setTid($transacaoGerada->tid);
            $this->setBandeira($transacaoGerada->bandeira);
            $this->setCartaoTruncado($transacaoGerada->cartao_truncado);
            $this->setTarifa($transacaoGerada->tarifa);
            $this->setTaxa($transacaoGerada->taxa);

            return $this;

        } catch (\Exception $e) {

            throw new \Exception($e);

        }

    }

    /**
     * Tokenizar um cartão de crédito
     * @return mixed
     * @throws \Exception
     */
    public function tokenizar() {

        $maquininha = new Maquininha($this);

        try {
            $transacaoDeToken = $maquininha->tokenizarCartao();

            print_r($transacaoDeToken); die();
        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);

        }

    }



}