<?php

/**
 * Usage:
 *  php index-cli.php -c Users -m index -v List
 *  php index-cli.php -c Users -m show -v Show -i 100
 */

define('IS_DEBUG', 1);

require __DIR__.'/vendor/autoload.php';

$opts = getopt('c:m:v:i:', ['ctrl:', 'meth:', 'view:', 'id:']);

if( IS_DEBUG ) {
    var_dump($opts);
}

$controller = getValueOfArgvAndCleanIt($opts, 'c|ctrl', $argv);
$method = getValueOfArgvAndCleanIt($opts, 'm|meth', $argv);
$view = getValueOfArgvAndCleanIt($opts, 'v|view', $argv);
$id = getValueOfArgvAndCleanIt($opts, 'i|id', $argv);

$view = 'View\\' . $view.$controller;
$model = 'Model\\' . $controller;
$controller = 'Controller\\' . $controller;

if( IS_DEBUG ) {
    echo 'Controller: ' . $controller . PHP_EOL;
    echo 'method: ' . $method . PHP_EOL;
    echo 'model: ' . $model . PHP_EOL;
    echo 'view: ' . $view . PHP_EOL;
    echo 'id: ' . $id . PHP_EOL;
}

if( IS_DEBUG ) {
    var_dump($argv);
}


$c = new $controller(new $view(), new $model());
$c->$method($id);



function getValueOfArgvAndCleanIt(array $opts, $param, &$global_argv)
{
    $opt = explode('|', $param);

    if( empty($opts[$opt[0]]) ) {
        if (empty($opts[$opt[1]])) {
            return NULL;
        } else {
            unset($global_argv[array_search('--'.$opt[1], $global_argv)]);
            unset($global_argv[array_search($opts[$opt[1]], $global_argv)]);
            return $opts[$opt[1]];
        }
    } else {
        unset($global_argv[array_search('-'.$opt[0], $global_argv)]);
        unset($global_argv[array_search($opts[$opt[0]], $global_argv)]);
        return $opts[$opt[0]];
    }
}
