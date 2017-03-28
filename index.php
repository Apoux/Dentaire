<?php

session_start();

require_once 'App/Autoload.php';
require_once 'Core/Autoload.php';

define('ROOT', dirname(str_replace('\\', '/', __DIR__)));
define('PATH', 'http://localhost/occasion-dentaire');
App\Autoloader::register();
Core\Autoloader::register();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'Home';
}

$page = explode('/', $page);

if(class_exists('\App\Controller\\' . ucfirst($page[0]) . 'Controller')) {
    if(!isset($page[1])) {
        $page = 'Error';
        $controller = '\App\Controller\\' . ucfirst($page) . 'Controller';
        $action = $page;
    } else {
        if(method_exists('\App\Controller\\' . ucfirst($page[0]) . 'Controller', $page[1])){
            $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
            $action = $page[1];
        }
        else {
            $page = 'Error';
            $controller = '\App\Controller\\' . ucfirst($page) . 'Controller';
            $action = $page;
        }
    }
} else {
    $page = 'Error';
    $controller = '\App\Controller\\' . ucfirst($page) . 'Controller';
    $action = $page;
}

$controller = new $controller();
$controller->$action();


