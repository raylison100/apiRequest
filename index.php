<?php

require_once ('vendor/autoload.php');
require_once('src/controller/SearchController.php');

// instance for the treatment of the requisition
$controller = new SearchController();
$controller->selectFlight();

?>

