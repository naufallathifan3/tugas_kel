<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Inventory::index');
$routes->get('/rekap', 'Inventory::rekap');
$routes->get('/items', 'Inventory::getItems');
$routes->post('/items', 'Inventory::saveItem');
$routes->delete('/items', 'Inventory::deleteItem');
$routes->get('/items/(:num)', 'Inventory::getItem/$1');
$routes->post('/items', 'Inventory::saveItem');
$routes->delete('/items', 'Inventory::deleteItem');


