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
    private $endPoint;
    public static $instance;

    private function __construct()
    {
        self::$instance = $this;
    }

    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function load($httpMethod, $httpHeaders, $httpEndPoint)
    {

        $this->method = $httpMethod;
        $this->headers = $httpHeaders;
        $this->endPoint = $httpEndPoint;
        $this->client = new Client();
    }

    public function index()
    {

        $response = $this->client->request($this->method, $this->endPoint, $this->headers);
        header('Content-Type: application/json');
        echo $response->getBody();
    }
}
