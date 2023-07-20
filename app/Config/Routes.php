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
// $routes->set404Override();
$routes->set404Override(function () {
    return view('error404');
});
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/home', 'Home::index');

$routes->get('/', 'LendingPage::index');
$routes->get('/admin', 'Dashboard::index');
$routes->get('/user', 'User::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/pengurus', 'Pengurus::index');
$routes->get('/alumni', 'Alumni::index');
// $routes->get('/anggotabem', 'AnggotaBem::index');
// $routes->get('/inventarisbem', 'InventarisBem::index');
// $routes->get('/inventarisworkshop', 'InventarisWorkshop::index');
$routes->get('/maba', 'Maba::index');
$routes->get('/arsip', 'Kesekretariatan::index');
$routes->get('/kegiatanhumas', 'Humas::index');
$routes->get('/kegiatankaderisasi', 'Kaderisasi::index');
$routes->get('/ibadahbulanan', 'Kerohanian::ibadah_bulanan');
$routes->get('/pemasukan_keuangan', 'Keuangan::pemasukan_keuangan');


$routes->get('admin/kesekretariatan/ajaxSearch', 'Kesekretariatan::ajaxSearch');

$routes->get('admin/kaderisasi/addanggota', 'Kaderisasi::addanggota');


// users zone
$routes->get('/admin/users', 'Users::list_user');
$routes->get('/admin/users/profile', 'Users::profile_users');
$routes->get('/admin/users/setting', 'Users::setting');

//Bendahara 
$routes->get('admin/bendahara', 'Bendahara::index');

//nama Angkatan
$routes->get('/admin/angkatan', 'Namaangkatan::index');
$routes->get('/angkatan/getdata', 'Namaangkatan::getdata');
$routes->get('/namaangkatan/save_namaangkatan', 'Namaangkatan::save_namaangkatan');
$routes->get('admin/angkatan/formtambah_angkatan', 'Namaangkatan::formtambah_angkatan');


// $routes->get('nama_angkatan/getdata', 'NamaAngkatan::data_namaangkatan');







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