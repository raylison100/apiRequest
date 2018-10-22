<?php

require_once ('vendor/autoload.php');
require_once('src/controller/BuscaController.php');


// instancia o controlado para tratamento da requisição
$controller = new BuscaController();
$controller->selectVoos();

?>
