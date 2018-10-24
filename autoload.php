<?php /** @noinspection ALL */
/**
 * Created by IntelliJ IDEA.
 * User: rayli
 * Date: 24/10/2018
 * Time: 17:02
 * @param $className
 */

spl_autoload_register(function ($class) {;
    require_once(DIR . DS . $class.".php");
});
