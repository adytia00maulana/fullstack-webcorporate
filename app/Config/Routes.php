<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// routing auth login
$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/auth', 'Auth::loginAuth');

$routes->get('/admin/utilities/info', 'Utilities::indexInfo');
$routes->get('/admin/list-company-info', 'Admin::getListCompanyInfo');

$routes->get('/admin', 'Admin::index', ['filter' => 'loginFilter']);
$routes->get('/admin/listUsers', 'Admin::applicationListUsers', ['filter' => 'loginFilter']);
$routes->get('/admin/listRole', 'Admin::applicationListRole', ['filter' => 'loginFilter']);
$routes->get('/admin/listProduct/(:any)', 'Admin::applicationListProduct/$1', ['filter' => 'loginFilter']);
$routes->get('/admin/listSourceProduct/(:num)', 'Admin::applicationListSourceProduct/$1', ['filter' => 'loginFilter']);
$routes->get('/admin/listDetailProduct/(:any)/(:num)', 'Admin::applicationListDetailProduct/$1/$2', ['filter' => 'loginFilter']);
$routes->post('/admin/postDataSource', 'Admin::postSourceProduct', ['filter' => 'loginFilter']);
$routes->get('/admin/getDataSource/(:any)', 'Admin::getSourceProduct/$1', ['filter' => 'loginFilter']);
$routes->get('/admin/deleteDataSource/(:any)', 'Admin::deleteSourceProduct/$1', ['filter' => 'loginFilter']);
$routes->post('/admin/postDataProduct', 'Admin::postProduct', ['filter' => 'loginFilter']);
$routes->get('/admin/getDataProduct/(:any)', 'Admin::getProduct/$1', ['filter' => 'loginFilter']);
$routes->get('/admin/deleteDataProduct/(:any)', 'Admin::deleteProduct/$1', ['filter' => 'loginFilter']);
$routes->post('/admin/postDataDetailProduct', 'Admin::postDetailProduct', ['filter' => 'loginFilter']);
$routes->get('/admin/getDataDetailProduct/(:any)', 'Admin::getDetailProduct/$1', ['filter' => 'loginFilter']);
$routes->get('/admin/deleteDataDetailProduct/(:any)', 'Admin::deleteDetailProduct/$1', ['filter' => 'loginFilter']);
// $routes->get('/admin/utilities/aboutUs', 'Utilities::index', ['filter' => 'loginFilter']);
// $routes->get('/admin/utilities/aboutUs/getAboutUsById/(:any)', 'Utilities::getAboutUs/$1', ['filter' => 'loginFilter']);
// $routes->post('/admin/utilities/aboutUs/postAboutUs', 'Utilities::postAboutUs', ['filter' => 'loginFilter']);
// $routes->get('/admin/utilities/aboutUs/deleteAboutUsById/(:any)', 'Utilities::deleteAboutUs/$1', ['filter' => 'loginFilter']);
// $routes->get('/admin/utilities/faq', 'Utilities::indexFaq', ['filter' => 'loginFilter']);
// $routes->get('/admin/utilities/faq/getFaqById/(:any)', 'Utilities::getFaq/$1', ['filter' => 'loginFilter']);
// $routes->post('/admin/utilities/faq/postFaq', 'Utilities::postFaq', ['filter' => 'loginFilter']);
// $routes->get('/admin/utilities/faq/deleteFaqById/(:any)', 'Utilities::deleteFaq/$1', ['filter' => 'loginFilter']);
$routes->get('/admin/utilities/gallery', 'Utilities::indexGallery', ['filter' => 'loginFilter']);
$routes->get('/admin/utilities/gallery/getGalleryById/(:any)', 'Utilities::getGallery/$1', ['filter' => 'loginFilter']);
$routes->post('/admin/utilities/gallery/upload/(:any)', 'Utilities::uploadGallery/$1', ['filter' => 'loginFilter']);
$routes->get('/admin/utilities/gallery/deleteById/(:any)/(:any)', 'Utilities::deleteGallery/$1/$2', ['filter' => 'loginFilter']);
$routes->get('/admin/utilities/logo', 'Utilities::indexLogo', ['filter' => 'loginFilter']);
$routes->post('/admin/utilities/logo/upload/(:any)', 'Utilities::uploadGallery/$1', ['filter' => 'loginFilter']);

// routing front / company profile
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/product', 'Home::product');
$routes->get('/info', 'Home::info');
$routes->get('/brand', 'Home::brand');
$routes->get('/faq', 'Home::faq');

