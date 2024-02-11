<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// routing front
$routes->get('/home', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');