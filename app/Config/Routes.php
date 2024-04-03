<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Modoro;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/produk/', 'Home::create');
$routes->get('/edit/(:num)', 'Home::edit/$1');
$routes->post('/produk/(:num)', 'Home::update/$1');


$routes->get('/modoro', 'Modoro::index');
$routes->get('modoro/home', 'Modoro::home');
$routes->get('/modoro/(:segment)', 'Modoro::modoro/$1');

$routes->post('/modoro/', 'Modoro::pilih');
$routes->post('/modoro/(:num)', 'Modoro::tambah/$1');

$routes->post('modoro/hasil/(:num)', 'Modoro::hasil/$1');



