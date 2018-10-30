<?php
define('DIR', __DIR__);
define('DS', DIRECTORY_SEPARATOR);


require_once('vendor/autoload.php');
require_once(DIR . DS . '/autoload.php');

use SRC\App;

$app = new App();
$app->run();
