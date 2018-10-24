<?php
/**
 * Created by IntelliJ IDEA.
 * User: rayli
 * Date: 24/10/2018
 * Time: 15:22
 */

namespace SRC;

use SRC\Controller\SearchController;
use SRC\Providers\SearchBreakService;
use SRC\Providers\ValidationService;

class App
{
    private $method;
    private $headers;
    private $url;

    public function run()
    {
        $this->load();

        if ($this->validation()) {

            $controller = new SearchController($this->method, $this->headers, $this->url);
            $controller->index();
        }
    }

    public function load()
    {
        $seachBreak = new SearchBreakService();
        $this->method = $seachBreak->getDiscoversMethod();
        $this->url = $seachBreak->getSmashURL();
        $this->headers = $seachBreak->getRequestHeaders();
    }

    public function validation()
    {

        $validation = new ValidationService($this->method, $this->url);
        if ($validation->validationMethod() && $validation->validationURL())
            return true;
        else
            return false;
    }
}
