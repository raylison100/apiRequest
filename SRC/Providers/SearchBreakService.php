<?php
/**
 * Created by IntelliJ IDEA.
 * User: rayli
 * Date: 24/10/2018
 * Time: 15:23
 */

namespace SRC\Providers;

class SearchBreakService
{

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

    public function getDiscoversMethod()
    {
        $request = $_SERVER['REQUEST_METHOD'];
        return $request;
    }

    public function getSmashURL()
    {
        $simpleURL = (parse_url($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']));
        return $simpleURL;
    }

    function getRequestHeaders()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }
            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
            $headers[$header] = $value;
        }
        return $headers;
    }

    public function getEndPoint()
    {

        switch ($this->getSmashURL()['path']) {
            case '/airports':
                return 'https://gateway.buscaaereo.com.br/psv/airports';
                break;
            case '/getConteudo':
                return 'http://localhost:3000/view/Conteudo/listar.php';
                break;
            default:
                return '';
                break;
        }
    }
}
