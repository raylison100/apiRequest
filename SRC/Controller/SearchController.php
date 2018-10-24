<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 22/10/18
 * Time: 12:03
 */

namespace SRC\Controller;

use GuzzleHttp\Client;

class SearchController
{
    private $client;
    private $method;
    private $headers;
    private $url;
    private $endPoint;


    function __construct($httpMethod, $httpHeaders, $httpURL)
    {
        $this->method = $httpMethod;
        $this->headers = $httpHeaders;
        $this->url = $httpURL;
        $this->setEndPoint();
        $this->client = new Client();
    }

    public function index()
    {
        $response = $this->client->request($this->method, $this->endPoint);
        header('Content-Type: application/json');
        echo $response->getBody();
    }

    public function setEndPoint()
    {
        $this->endPoint = 'https://gateway.buscaaereo.com.br/psv/airports';
    }
}
