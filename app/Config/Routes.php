<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/ci4', 'Home::index');

$routes->get('/', 'Users\ControllerHome::index');


$routes->get('/dev', 'Admin\ControllerAdminDeveloper::index', ['filter' => 'login']);
$routes->get('dev/menu', 'Admin\ControllerAdminCRUDMenu::index', ['filter' => 'login']);

$routes->post('/dev/store', 'Admin\ControllerAdminCRUDMenu::create');
$routes->post('/dev/menu/store', 'Admin\ControllerAdminDeveloper::store');
$routes->post('/dev/update/(:num)', 'Admin\ControllerAdminDeveloper::update/$1');

