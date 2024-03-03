<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// routing back / wp admin
$routes->get('private/auth/login', 'Auth::login');
$routes->get('private/auth/check', 'Auth::check');
$routes->get('private/auth/logout', 'Auth::logout');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/applicationListUsers', 'Admin::applicationListUsers');
$routes->get('/admin/applicationListRole', 'Admin::applicationListRole');

// routing front / company profile
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/product', 'Home::product');
$routes->get('/info', 'Home::info');
$routes->get('/faq', 'Home::faq');

