<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// routing back / wp admin
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/check', 'Auth::check');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/listUsers', 'Admin::applicationListUsers');
$routes->get('/admin/listRole', 'Admin::applicationListRole');
$routes->get('/admin/listProduct', 'Admin::applicationListProduct');
$routes->get('/admin/listSourceProduct/(:num)', 'Admin::applicationListSourceProduct/$1');
$routes->get('/admin/listDetailProduct/(:any)/(:num)', 'Admin::applicationListDetailProduct/$1/$2');
$routes->post('/admin/postDataSource', 'Admin::postSourceProduct');
$routes->get('/admin/getDataSource/(:any)', 'Admin::getSourceProduct/$1');
$routes->get('/admin/deleteDataSource/(:num)', 'Admin::deleteSourceProduct/$1');

// routing front / company profile
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/product', 'Home::product');
$routes->get('/info', 'Home::info');
$routes->get('/faq', 'Home::faq');

