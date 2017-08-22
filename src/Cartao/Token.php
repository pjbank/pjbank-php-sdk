<?php

namespace PJBank\Cartao;

use PJBank\Api\PJBankClient;

/**
 * Class Token
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>s
 * @package PJBank\Cartao
 */
class Token
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
     * Token do cartão
     * @var
     */
    private $token_cartao;

    /**
     * Numero Raw do cartão
     * @var
     */
    private $numero_cartao;

    /**
     * Codigo CVV
     * @var
     */
    private $codigo_cvv;

    /**
     * Nome do portador do cartão
     * @var
     */
    private $nome_cartao;

    /**
     * Mês do vencimento do cartão
     * @var
     */
    private $mes_vencimento;

    /**
     * Ano do vencimento do cartão
     * @var
     */
    private $ano_vencimento;

    /**
     * CPF do portador do cartão
     * @var
     */
    private $cpf_cartao;

    /**
     * E-mail de contato do portador do cartão
     * @var
     */
    private $email_cartao;

    /**
     * Celular de contato do portador do cartão
     * @var
     */
    private $celular_cartao;

    /**
     * @return mixed
     */
    public function getTokenCartao()
    {
        return $this->token_cartao;
    }

    /**
     * @param mixed $token_cartao
     * @return Token
     */
    public function setTokenCartao($token_cartao)
    {
        $this->token_cartao = $token_cartao;
        return $this;
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
     * @return Token
     */
    public function setNumeroCartao($numero_cartao)
    {
        $this->numero_cartao = $numero_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoCvv()
    {
        return $this->codigo_cvv;
    }

    /**
     * @param mixed $codigo_cvv
     * @return Token
     */
    public function setCodigoCvv($codigo_cvv)
    {
        $this->codigo_cvv = $codigo_cvv;
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
     * @return Token
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
     * @return Token
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
     * @return Token
     */
    public function setAnoVencimento($ano_vencimento)
    {
        $this->ano_vencimento = $ano_vencimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpfCartao()
    {
        return $this->cpf_cartao;
    }

    /**
     * @param mixed $cpf_cartao
     * @return Token
     */
    public function setCpfCartao($cpf_cartao)
    {
        $this->cpf_cartao = $cpf_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailCartao()
    {
        return $this->email_cartao;
    }

    /**
     * @param mixed $email_cartao
     * @return Token
     */
    public function setEmailCartao($email_cartao)
    {
        $this->email_cartao = $email_cartao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelularCartao()
    {
        return $this->celular_cartao;
    }

    /**
     * @param mixed $celular_cartao
     * @return Token
     */
    public function setCelularCartao($celular_cartao)
    {
        $this->celular_cartao = $celular_cartao;
        return $this;
    }


    /**
     * Token constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial_cartao = $credencial;
        $this->chave_cartao = $chave;
    }


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
     * Gera um Token a partir dos dados de cartão informado.
     * Esse token só é válido para essa credencial de conta
     * tornando inútil caso seja utilizado sem a credencial e chave
     */
    public function gerar()
    {

        $PJBankClient = new PJBankClient();
        $client = $PJBankClient->getClient();

        $tokenItens = $this->getValues();

        unset($tokenItens['credencial_cartao']);
        unset($tokenItens['chave_cartao']);

        try {

            $resource = "recebimentos/{$this->credencial_cartao}/tokens";

            $res = $client->request('POST', $resource, ['json' => $tokenItens, 'headers' => [
                'Content-Type' => 'Application/json',
                'X-CHAVE' => $this->chave_cartao
            ]]);

            $result = json_decode((string)$res->getBody());
            $this->setTokenCartao($result->token_cartao);

            return $result;

        } catch (ClientException $e) {

            $responseBody = json_decode($e->getResponse()->getBody());
            throw new \Exception($responseBody->msg, $responseBody->status);

        }

    }
}