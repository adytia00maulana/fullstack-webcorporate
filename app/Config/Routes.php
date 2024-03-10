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
$routes->get('/admin/listProduct/(:any)', 'Admin::applicationListProduct/$1');
$routes->get('/admin/listSourceProduct/(:num)', 'Admin::applicationListSourceProduct/$1');
$routes->get('/admin/listDetailProduct/(:any)/(:num)', 'Admin::applicationListDetailProduct/$1/$2');
$routes->post('/admin/postDataSource', 'Admin::postSourceProduct');
$routes->get('/admin/getDataSource/(:any)', 'Admin::getSourceProduct/$1');
$routes->get('/admin/deleteDataSource/(:any)', 'Admin::deleteSourceProduct/$1');
$routes->post('/admin/postDataProduct', 'Admin::postProduct');
$routes->get('/admin/getDataProduct/(:any)', 'Admin::getProduct/$1');
$routes->get('/admin/deleteDataProduct/(:any)', 'Admin::deleteProduct/$1');
$routes->post('/admin/postDataDetailProduct', 'Admin::postDetailProduct');
$routes->get('/admin/getDataDetailProduct/(:any)', 'Admin::getDetailProduct/$1');
$routes->get('/admin/deleteDataDetailProduct/(:any)', 'Admin::deleteDetailProduct/$1');
$routes->get('/admin/utilities/aboutUs', 'Utilities::index');
$routes->get('/admin/utilities/aboutUs/getAboutUsById/(:any)', 'Utilities::getAboutUs/$1');
$routes->post('/admin/utilities/aboutUs/postAboutUs', 'Utilities::postAboutUs');
$routes->get('/admin/utilities/aboutUs/deleteAboutUsById/(:any)', 'Utilities::deleteAboutUs/$1');
$routes->get('/admin/utilities/faq', 'Utilities::indexFaq');
$routes->get('/admin/utilities/faq/getFaqById/(:any)', 'Utilities::getFaq/$1');
$routes->post('/admin/utilities/faq/postFaq', 'Utilities::postFaq');
$routes->get('/admin/utilities/faq/deleteFaqById/(:any)', 'Utilities::deleteFaq/$1');

// routing front / company profile
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/product', 'Home::product');
$routes->get('/info', 'Home::info');
$routes->get('/faq', 'Home::faq');

