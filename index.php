<?php
define('DIR', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

require_once('vendor/autoload.php');
require_once(DIR . DS . '/autoload.php');
require_once('SRC/App.php');

$app = new SRC\App();
$app->run();
