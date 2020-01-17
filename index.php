<?php

// FRONT CONTROLLER

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

// Вызов Router
$router = new Router();
$router->run();
