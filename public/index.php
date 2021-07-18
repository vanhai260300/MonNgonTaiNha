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
$router->add('/DoAn1/public/Admin/checkUsername', ['controller' => 'AdminController', 'action' => 'checkUsername']);
$router->add('/DoAn1/public/Admin/deleteAdmin', ['controller' => 'AdminController', 'action' => 'deleteAdmin']);
//Admin / Mon An
$router->add('/DoAn1/public/Admin/monan', ['controller' => 'AdMonAnController', 'action' => 'index']);
$router->add('/DoAn1/public/admin/them-MonAn', ['controller' => 'AdMonAnController', 'action' => 'insertMonAn']);
$router->add('/DoAn1/public/admin/thung-rac', ['controller' => 'AdMonAnController', 'action' => 'trashMonAn']);
$router->add('/DoAn1/public/admin/deleteMonAn', ['controller' => 'AdMonAnController', 'action' => 'deleteMonAn']);
$router->add('/DoAn1/public/admin/RestoreMonAn', ['controller' => 'AdMonAnController', 'action' => 'RestoreMonAn']);

//Admin login
$router->add('/DoAn1/public/Admin/login', ['controller' => 'AdLoginController', 'action' => 'index']);
$router->add('/DoAn1/public/Admin/logout', ['controller' => 'AdLoginController', 'action' => 'logout']);


$router->dispatch($_SERVER['REQUEST_URI']);
