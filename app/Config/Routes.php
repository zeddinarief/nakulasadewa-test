<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/product', 'Product::index');
$routes->get('/product/(:any)', 'Product::detail/$1');
$routes->post('/product/order', 'Order::add_order');

$routes->get('/admin', 'Product::data_product');
// auth
$routes->get('/admin/login', 'Auth::index');
$routes->post('/admin/login', 'Auth::login');
$routes->get('/admin/logout', 'Auth::logout');
// product
$routes->get('/admin/product', 'Product::data_product');
$routes->get('/admin/product/add', 'Product::add');
$routes->post('/admin/product/add', 'Product::save');
$routes->get('/admin/product/edit/(:any)', 'Product::edit/$1');
$routes->post('/admin/product/edit/(:num)', 'Product::update/$1');
$routes->delete('/admin/product/(:num)', 'Product::delete/$1');
// order
$routes->get('/admin/order', 'Order::index');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
