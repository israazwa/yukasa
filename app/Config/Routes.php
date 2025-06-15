<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/ci4', 'Home::index');

$routes->get('/', 'Users\ControllerHome::index');
$routes->get('/menu/(:num)', 'Users\ControllerHome::detail/$1');
$routes->post('/menu/up', 'Users\ControllerHome::contact');
$routes->post('/upptofile/(:any)', 'Users\ControllerHome::updateImage/$1', ['filter' => 'login']);


$routes->get('/dev', 'Admin\ControllerAdminDeveloper::index', ['filter' => 'login']);

$routes->get('/dev/menu', 'Admin\ControllerAdminCRUDMenu::index', ['filter' => 'login']);
$routes->post('/dev/store', 'Admin\ControllerAdminCRUDMenu::create');
$routes->post('/menu/delete/(:num)', 'Admin\ControllerAdminCRUDMenu::delete/$1');

$routes->post('/dev/menu/store', 'Admin\ControllerAdminDeveloper::store');
$routes->post('/dev/update/(:num)', 'Admin\ControllerAdminDeveloper::update/$1');

$routes->get('/checkout', 'Users\ControllerCheckOut::index', ['filter' => 'login']);
$routes->post('/checkout/up', 'Users\ControllerCheckOut::submit', ['filter' => 'login']);

$routes->get('/dev/bukti', 'Admin\ControllerBukti::index', ['filter' => 'login']);
