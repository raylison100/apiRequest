<?php

use \routes\Router;

require_once 'Router.php';

$app = new Router();
$bucaController = new BuscaController();

$app->route('/get', function(){
    return "iuyfsdiu";
});

$app->route('/post', function(){
    echo "pagina de contato!";
});

$app->run();