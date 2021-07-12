<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

session_start();
/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes CLIENT
$router->add('/DoAn1/public/', ['controller' => 'Home', 'action' => 'index']);

//Routes ADMIN
$router->add('/DoAn1/public/Admin', ['controller' => 'AdminController', 'action' => 'index']);
$router->add('/DoAn1/public/Admin/accAdmin', ['controller' => 'AdminController', 'action' => 'accAdmin']);
$router->add('/DoAn1/public/Admin/insertAdmin', ['controller' => 'AdminController', 'action' => 'insertAdmin']);
$router->add('/DoAn1/public/Admin/updateAdmin', ['controller' => 'AdminController', 'action' => 'updateAdmin']);

//Admin login
$router->add('/DoAn1/public/Admin/login', ['controller' => 'AdLoginController', 'action' => 'index']);
$router->add('/DoAn1/public/Admin/logout', ['controller' => 'AdLoginController', 'action' => 'logout']);


$router->dispatch($_SERVER['REQUEST_URI']);
