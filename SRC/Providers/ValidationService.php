<?php
/**
 * Created by IntelliJ IDEA.
 * User: rayli
 * Date: 24/10/2018
 * Time: 20:21
 */
namespace SRC\Providers;

class ValidationService
{
    private $method;
    private $pathURL;

    function __construct($getMethod, $getPathURL)
    {
        $this->method = $getMethod;
        $this->pathURL = $getPathURL;
    }

    public function validationMethod()
    {

        switch ($this->method) {
            case 'GET':
                return true;
                break;
            case 'POST':
                return true;
                break;
            case 'PUT':
                return true;
                break;
            case 'DELETE':
                return false;
                break;
            default:
                return false;
                break;
        }
    }

    public function validationURL()
    {

        switch ($this->pathURL['path']) {
            case '/airports':
                return true;
                break;
            default:
                return false;
                break;
        }
    }
}
