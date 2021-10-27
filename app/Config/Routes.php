<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Guest\HomeController::index');

$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin\HomeController::index');
    $routes->group('notification', function ($routes)
    {
        $routes->post('/add', 'Admin\Notification::add');
        $routes->post('/update', 'Admin\Notification::update');
        $routes->post('/delete', 'Admin\Notification::delete');
    });
    $routes->group('chidoan', function ($routes)
    {
        $routes->post('/add', 'Admin\ChiDoan::add');
        $routes->post('/delete', 'Admin\ChiDoan::delete');
        $routes->post('/update', 'Admin\ChiDoan::update');

    });
    $routes->group('clb', function ($routes)
    {
        $routes->post('/add', 'Admin\Clb::add');
        $routes->post('/update', 'Admin\Clb::update');
        $routes->post('/delete', 'Admin\Clb::delete');
    });
    $routes->group('lienchidoan', function ($routes)
    {
        $routes->post('/add', 'Admin\LienChiDoan::add');
        $routes->post('/update', 'Admin\LienChiDoan::update');
        $routes->post('/delete', 'Admin\LienChiDoan::delete');
    });

});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
