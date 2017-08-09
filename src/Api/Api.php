<?php

namespace PJBank\Api;

/**
 * API Configuration Manager
 * @author Matheus Fideliss
 * @package PJBank\Api
 */
class Api
{

    /**
     * URL base da API
     * @var string
     */
    protected $apiBaseUrl = "https://api.pjbank.com.br/";

    /**
     * Versão da API a ser consumida pelo SDK
     * @var string
     */
    protected $version = "v3";

    /**
     * Resource a ser acessado
     * @var
     */
    protected $resource;

    /**
     * Headers a serem enviados na requisição para a API
     * @var array
     */
    protected $headers = array();

}