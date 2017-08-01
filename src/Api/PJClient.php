<?php

namespace PJBank\Api;

/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 01/08/17
 * Time: 15:13
 */
class PJClient
{

    private $api = "";

    private $version = "v3";

    private $resource;

    public function resource($resource) {

    }

    public function generateQueryString(array $query) {
        return http_build_query($query);
    }

    public function post($resource, $data) {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://testcURL.com',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data
        ));

        $resp = curl_exec($curl);
        curl_close($curl);

    }

    public function get($resource, $data) {

        $queryParams = $this->generateQueryString($data);


    }


}