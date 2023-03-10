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
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/login','Login::index');
$routes->get('/login/logout','Login::logout');
$routes->post('/login/index','Login::index');
$routes->post('/mitglieder/index','Mitglieder::index');
$routes->get('/aktuellesProjekt','AktuellesProjekt::index');
$routes->get('/aktuellesProjekt/(:num)','AktuellesProjekt::index/$1');
$routes->get('/mitglieder','Mitglieder::index');
$routes->get('/mitglieder/ced_Mitglieder/(:num)/(:num)','Mitglieder::ced_Mitglieder/$1/$2');
$routes->post('/mitglieder/submit_ced','Mitglieder::submit_ced');
$routes->post('/projekte/submit_ced','Projekte::submit_ced');
$routes->post('/projekte/ced_Projekte','Projekte::ced_Projekte');
$routes->get('/reiter','Reiter::index');
$routes->get('/aufgaben','Aufgaben::index');
$routes->post('/aufgaben/submit_ced','Aufgaben::submit_ced');
$routes->get('/aufgaben/(:num)/(:num)','Aufgaben::ced_Aufgaben/$1/$2');
$routes->get('/projekte','Projekte::index');

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
