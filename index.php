<?php

define('IS_DEBUG', 1);

require __DIR__.'/vendor/autoload.php';

$controller = $_REQUEST['ctrl'];
$method = $_REQUEST['meth'];
$view = $_REQUEST['view'];
$id = $_REQUEST['id'];

$view = 'View\\' . $view.$controller;
$model = 'Model\\' . $controller;
$controller = 'Controller\\' . $controller;

if( IS_DEBUG ) {
    echo '<pre>';
    echo 'Controller: ' . $controller . PHP_EOL;
    echo 'method: ' . $method . PHP_EOL;
    echo 'model: ' . $model . PHP_EOL;
    echo 'view: ' . $view . PHP_EOL;
    echo 'id: ' . $id . PHP_EOL;
    echo '</pre>';
}

$c = new $controller(new $view(), new $model());
$c->$method($id);