<?php

namespace PJBank\Extrato;

/**
 * Class Extrato
 * @author Matheus Fidelis <matheus.fidelis@superlogica.com>
 * @package PJBank\Extrato
 */
class Extrato
{

    /**
     * Credencial da conta
     * @var
     */
    private $credencial;

    /**
     * Chave da conta
     * @var
     */
    private $chave;

    /**
     * Filtro: Data inicio do extrato
     * @var
     */
    private $data_inicio;

    /**
     * Filtro: Data fim do extrato
     * @var
     */
    private $data_fim;

    /**
     * Flag que define se o extrato irá mostrar somente
     * as cobranças liquidadas
     * @var
     */
    private $pago;

    /**
     * @return mixed
     */
    public function getCredencial()
    {
        return $this->credencial;
    }

    /**
     * @param mixed $credencial
     * @return Extrato
     */
    public function setCredencial($credencial)
    {
        $this->credencial = $credencial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChave()
    {
        return $this->chave;
    }

    /**
     * @param mixed $chave
     * @return Extrato
     */
    public function setChave($chave)
    {
        $this->chave = $chave;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataInicio()
    {
        return $this->data_inicio;
    }

    /**
     * @param mixed $data_inicio
     * @return Extrato
     */
    public function setDataInicio($data_inicio)
    {
        $this->data_inicio = $data_inicio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataFim()
    {
        return $this->data_fim;
    }

    /**
     * @param mixed $data_fim
     * @return Extrato
     */
    public function setDataFim($data_fim)
    {
        $this->data_fim = $data_fim;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * @param mixed $pago
     * @return Extrato
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
        return $this;
    }

    /**
     * Extrato constructor.
     * @param $credencial
     * @param $chave
     */
    public function __construct($credencial, $chave)
    {
        $this->credencial = $credencial;
        $this->chave = $chave;
    }

}