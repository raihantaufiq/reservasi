<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/courses', 'Courses::home');
$routes->get('/contact', 'Contact::index');
$routes->get('/about', 'About::index');
$routes->get('/profile', 'Profile::index');

$routes->get('/join-class/(:num)', 'JoinClass::index/$1');
$routes->get('/join-class/pembayaran/(:num)/(:num)', 'Pembayaran::index/$1/$2');
$routes->get('/join-class/thankyou/(:num)/(:num)', 'ThankYou::index/$1/$2');
$routes->get('/join-class/thankyou/export/(:num)/(:num)', 'ThankYou::exportPDF/$1/$2');

$routes->get('/contact/insert', 'Contact::insert');

$routes->get('/login/index', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

$routes->get('/register/index', 'Register::index');
$routes->post('/register/process', 'Register::process');

$routes->get('/admin/courses', 'Courses::admin');
$routes->get('/courses/create', 'Courses::create');
$routes->get('/courses/update/(:num)', 'Courses::update/$1');
$routes->get('/courses/delete/(:num)', 'Courses::delete/$1');
$routes->post('/courses/insert', 'Courses::insert');
$routes->post('/courses/change/(:num)', 'Courses::change/$1');

$routes->get('/admin/pesan', 'Contact::admin');
$routes->get('/pesan/detail/(:num)', 'Contact::detail/$1');
$routes->get('/pesan/delete/(:num)', 'Contact::delete/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
