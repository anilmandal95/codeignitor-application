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

$routes->get('user/logout', 'userController::userLogout');

$routes->get('user/dashboard','userController::userDashboard',['filter' => 'isLoginFilter']);


//$routes->get('admin/dashboard','AdminController::adminDashboard',['filter' =>'isAdminFilter']);

$routes->group('admin/',['filter' => 'isAdminFilter'], static function ($routes) {
    $routes->get('dashboard','AdminController::adminDashboard');
});