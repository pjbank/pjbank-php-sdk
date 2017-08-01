<?php

namespace PJBank\Boleto;

use PJBank\Boleto\Boleto;

/**
 * Class PJBank Boletos
 * @author Matheus Fidelis
 * @email matheus.fidelis@superlogica.com
 */
class BoletosManager
{

    /**
     * Credencial da Conta de Boletos
     * @var
     */
    private $credencial_boletos;

    /**
     * Chave de uma Conta de Boletos
     * @var
     */
    private $chave_boletos;

    /**
     * BoletosManager constructor.
     * @param $credencial
     * @param $boletos
     */
    public function __construct($credencial, $boletos)
    {
        $this->credencial_boletos = $credencial;
        $this->chave_boletos = $boletos;
    }

    /**
     * Gera um novo boleto
     * @return \PJBank\Boleto\Boleto
     */
    public function NovoBoleto() {
        return new Boleto($this->credencial_boletos, $this->chave_boletos);
    }




}