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

    private $api = "";

    private $version = "v3";

    private $resource;

    protected $headers = array();

    public function setResource($resource) {
        $this->resource = $resource;
        return $this;
    }

    /**
     * @param array $query
     * @return string
     */
    public function generateQueryString(array $query) {
        return http_build_query($query);
    }

    /**
     * @param $resource
     * @param array $data
     */
    public function post($resource, $data = array()) {

        $url = $this->api . "/" . $resource;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'PJBank SDK - User Agent!!!',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data
        ));

        $resp = curl_exec($curl);
        curl_close($curl);

    }

    /**
     * @param $resource
     * @param $data
     */
    public function get($resource, $data) {

        $queryParams = $this->generateQueryString($data);

    }
}