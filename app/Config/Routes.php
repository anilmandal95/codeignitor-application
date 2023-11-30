<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//$routes->get('user/registration', 'UserController::index');
$routes->get('user/registration', 'UserController::userRegistration');

$routes->post('register', 'UserController::userRegistration');

$routes->get('user/login', 'userController::userLogin');

$routes->post('login', 'userController::userLogin');