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
}