<?php
/**
 * Created by PhpStorm.
 * User: raylison100
 * Date: 17/10/18
 * Time: 12:14
 */

class Router
{
    private $config = [];
    private $uri;

    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $this->uri = $uri;
        }
    }

    public function route($route, $callback)
    {
        $this->config[] = [$route => $callback];
    }

    public function run()
    {
        foreach ($this->config as $routes) {
            if (array_key_exists($this->uri, $routes)) {
                if ( is_callable($routes[$this->uri]) ) {
                    return $routes[$this->uri]();
                }
            }
        }

        http_response_code(404);
    }

}