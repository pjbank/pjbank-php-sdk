<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 01/08/17
 * Time: 17:32
 */

namespace PJBank\Api;


class Api
{

    protected $apiBaseUrl = "https://wau8eql282.execute-api.sa-east-1.amazonaws.com/estagio/";

    protected $version = "v3";

    protected $resource;

    protected $headers = array();

}