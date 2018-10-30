<?php
/**
 * Created by IntelliJ IDEA.
 * User: rayli
 * Date: 24/10/2018
 * Time: 20:21
 */

namespace SRC\Providers;

use SRC\Controller\EmailController;
use SRC\Controller\SearchController;

class ValidationURLService
{
    private $method;
    private $pathURL;

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

    function load($getMethod, $getPathURL)
    {
        $this->method = $getMethod;
        $this->pathURL = $getPathURL;
    }

    public function validationMethod()
    {

        switch ($this->method) {
            case 'GET':
                return $this->validationURLGET();
                break;
            case 'POST':
                return $this->validationURLPOST();
                break;
            case 'PUT':
                return '';
                break;
            case 'DELETE':
                return '';
                break;
            default:
                return '';
                break;
        }
    }

    public function validationURLGET()
    {
        switch ($this->pathURL['path']) {
            case '/airports':
                return 'SearchController';
                break;
        }
    }

    public function validationURLPOST()
    {

        switch ($this->pathURL['path']) {
            case '/submit':
                return 'EmailController';
                break;
        }
    }

    public function validationPermission()
    {
        return $this->validationMethod();
    }
}
