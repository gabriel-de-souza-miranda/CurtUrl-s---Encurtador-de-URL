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
$routes->setDefaultController('Site');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Site::index');
$routes->get('site/login', 'Site::login');
$routes->get('site/cadastro', 'Site::cadastro');
$routes->get('site/novasenha', 'site::novasenha');

$routes->post('sendemail/email', 'SendEmail::email');
$routes->get('site/senha', 'Site::senha');
$routes->post('sendemail/verifica', 'SendEmail::verifica');


$routes->post('encurtador/shortUrl', 'Encurtador::shortUrl');
$routes->get('/(:alphanum)', 'Encurtador::desencurtar/$1');

$routes->get('historicourls/hist', 'HistoricoUrls::Hist');

$routes->get('user/index_login', 'User::index_login');
$routes->get('user/new_senha', 'User::new_senha');
$routes->post('user/inseriruser', 'User::inseriruser');

$routes->post('user/alteraSenha', 'User::alteraSenha');

$routes->post('delete/del', 'Delete::del');


$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');
$routes->post('auth/defsenha', 'Auth::defsenha');



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
