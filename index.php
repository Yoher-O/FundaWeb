<?php
// require_once 'model/database.php';
require_once 'controller/services.controller.php';
require_once 'controller/categories.controller.php';
require_once 'controller/products.controller.php';
require_once 'controller/home.controller.php';
require_once 'controller/brands.controller.php';

if(isset($_REQUEST['c']))
{
    $controller = $_REQUEST['c'];
}
else {
    $controller = 'home';
}

if(!isset($_REQUEST['c']))
{
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
}
else
{
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    call_user_func( array( $controller, $accion ) );
}
