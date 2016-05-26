<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 18:17
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/Autoload.php';
require_once ROOT . '/components/Router.php';
require_once ROOT . '/components/Db.php';

session_start();

$router = new Router;
$router->run();