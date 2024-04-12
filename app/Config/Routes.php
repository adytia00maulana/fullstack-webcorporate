<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// routing auth login
$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/auth', 'Auth::loginAuth');

$routes->group('admin', ['filter' => 'loginFilter'], static function ($subRoutes) {
    $subRoutes->add('', 'Admin::index');
    $subRoutes->get('listUsers', 'Admin::applicationListUsers');
    $subRoutes->get('listRole', 'Admin::applicationListRole');
    $subRoutes->get('listProduct/(:any)', 'Admin::applicationListProduct/$1');
    $subRoutes->get('listSourceProduct/(:num)', 'Admin::applicationListSourceProduct/$1');
    $subRoutes->get('listDetailProduct/(:any)/(:num)', 'Admin::applicationListDetailProduct/$1/$2');
    $subRoutes->post('postDataSource', 'Admin::postSourceProduct');
    $subRoutes->get('getDataSource/(:any)', 'Admin::getSourceProduct/$1');
    $subRoutes->get('deleteDataSource/(:any)', 'Admin::deleteSourceProduct/$1');
    $subRoutes->post('postDataProduct', 'Admin::postProduct');
    $subRoutes->get('getDataProduct/(:any)', 'Admin::getProduct/$1');
    $subRoutes->get('deleteDataProduct/(:any)', 'Admin::deleteProduct/$1');
    $subRoutes->post('postDataDetailProduct', 'Admin::postDetailProduct');
    $subRoutes->get('getDataDetailProduct/(:any)', 'Admin::getDetailProduct/$1');
    $subRoutes->get('deleteDataDetailProduct/(:any)', 'Admin::deleteDetailProduct/$1');

    /***** Utilities *****/
    $subRoutes->group('utilities', static function ($UtilRoutes) {
        // event routes
        $UtilRoutes->get('event', 'Utilities::indexEvent');
        $UtilRoutes->post('create-event', 'Utilities::PostEvent');
        $UtilRoutes->get('form-event', 'Utilities::formEvent');
        $UtilRoutes->get('form-detail-event/(:any)', 'Utilities::formDetail/$1');
        $UtilRoutes->post('update-event/(:any)', 'Utilities::UpdateEvent/$1');
        $UtilRoutes->post('event/upload/(:any)', 'Utilities::uploadEvent/$1');
        $UtilRoutes->get('event/deleteById/(:any)/(:any)/(:any)', 'Utilities::deleteEvent/$1/$2/$3');
        $UtilRoutes->post('event/updatePosition/(:any)', 'Utilities::updatePositionEvent/$1');
        
        $UtilRoutes->get('store', 'Utilities::indexStore');
        $UtilRoutes->post('create-store', 'Utilities::PostStore');
        $UtilRoutes->get('form-store', 'Utilities::FormStore');
        $UtilRoutes->get('form-detail-store/(:any)', 'Utilities::formDetailStore/$1');
        $UtilRoutes->post('update-store/(:any)', 'Utilities::UpdateStore/$1');
        $UtilRoutes->get('deleteStoreById/(:any)', 'Utilities::deleteStore/$1');

        $UtilRoutes->get('gallery/(:any)', 'Utilities::indexGallery/$1');
        $UtilRoutes->get('gallery/getGalleryById/(:any)', 'Utilities::getGallery/$1');
        $UtilRoutes->post('gallery/upload/(:any)', 'Utilities::uploadGallery/$1');
        $UtilRoutes->get('deleteGalleryById/(:any)/(:any)/(:any)', 'Utilities::deleteGallery/$1/$2/$3');
        $UtilRoutes->post('gallery/updatePosition/(:any)', 'Utilities::updatePositionGallery/$1');

        $UtilRoutes->get('logo', 'Utilities::indexLogo');
        $UtilRoutes->post('logo/postLogo', 'Utilities::postLogo');

        $UtilRoutes->get('vm', 'Utilities::indexVm');
        $UtilRoutes->post('vm/postVm', 'Utilities::postVm');

        $UtilRoutes->get('ba', 'Utilities::indexBrandAmbassador');
        $UtilRoutes->post('ba/upload/(:any)', 'Utilities::uploadBrandAmbassador/$1');
        $UtilRoutes->get('ba/deleteById/(:any)/(:any)', 'Utilities::deleteBrandAmbassador/$1/$2');
        $UtilRoutes->post('ba/updatePosition', 'Utilities::updatePositionBrandAmbassador');
        // $UtilRoutes->get('aboutUs', 'Utilities::index', ['filter' => 'loginFilter']);
        // $UtilRoutes->get('aboutUs/getAboutUsById/(:any)', 'Utilities::getAboutUs/$1', ['filter' => 'loginFilter']);
        // $UtilRoutes->post('aboutUs/postAboutUs', 'Utilities::postAboutUs', ['filter' => 'loginFilter']);
        // $UtilRoutes->get('aboutUs/deleteAboutUsById/(:any)', 'Utilities::deleteAboutUs/$1', ['filter' => 'loginFilter']);
        // $UtilRoutes->get('faq', 'Utilities::indexFaq', ['filter' => 'loginFilter']);
        // $UtilRoutes->get('faq/getFaqById/(:any)', 'Utilities::getFaq/$1', ['filter' => 'loginFilter']);
        // $UtilRoutes->post('faq/postFaq', 'Utilities::postFaq', ['filter' => 'loginFilter']);
        // $UtilRoutes->get('faq/deleteFaqById/(:any)', 'Utilities::deleteFaq/$1', ['filter' => 'loginFilter']);
    });
});

// routing front / company profile
$routes->get('/', 'Home::index');
$routes->get('/vm', 'Home::visiMisi');
$routes->get('/about', 'Home::about');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/product/(:any)', 'Home::product/$1');
$routes->get('/detailProduct/(:any)', 'Home::detailProduct/$1');
$routes->get('/info', 'Home::info');
$routes->get('/brand', 'Home::brand');
$routes->get('/faq', 'Home::faq');

