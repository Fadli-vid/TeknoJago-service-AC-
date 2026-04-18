<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// USER
$routes->get('/', 'Admin::Dashboard');

// USER (tambahkan filter 'auth')
$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'User::index');
    $routes->get('user-pemesanan', 'User::userPemesanan');
    $routes->get('tambah-pemesanan', 'User::tambahPemesanan');
    $routes->post('simpan-pemesanan', 'User::simpanPemesanan');
    $routes->get('user-riwayat', 'User::riwayat');
    $routes->get('profil', 'User::profil');
    $routes->get('invoice/(:num)', 'User::invoice/$1'); // Tambahkan baris ini
});

$routes->post('user/update-password', 'User::updatePassword');
$routes->post('user/update-profile', 'LoginUser::updateProfile'); // tambahkan baris ini


// ADMIN
$routes->group('admin', ['filter' => 'adminauth'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('pemesanan', 'Admin::pemesanan');
    $routes->get('terima-pemesanan/(:num)', 'Admin::terimaPemesanan/$1');
    $routes->get('tambah-pesan', 'Admin::tambahPesan');
    $routes->post('simpan-pesan', 'Admin::simpanPesan');
    $routes->get('ubah-pemesanan/(:num)', 'Admin::ubahPemesanan/$1');
    $routes->post('update-pemesanan/(:num)', 'Admin::updatePemesanan/$1');
    $routes->get('hapus-pemesanan/(:num)', 'Admin::hapusPemesanan/$1');


    $routes->get('riwayat', 'Admin::riwayat');
    $routes->get('tambah-riwayat', 'Admin::tambahRiwayat');
    $routes->post('simpan-riwayat', 'Admin::simpanRiwayat');
    $routes->get('ubah-riwayat/(:num)', 'Admin::editRiwayat/$1');
    $routes->post('update-riwayat/(:num)', 'Admin::updateRiwayat/$1');
    $routes->get('hapus-riwayat/(:num)', 'Admin::hapusRiwayat/$1');


    $routes->get('teknisi', 'Admin::teknisi');
    $routes->get('tambah-teknisi', 'Admin::tambahTeknisi');
    $routes->post('simpan-teknisi', 'Admin::simpanTeknisi');
    $routes->get('edit-teknisi/(:num)', 'Admin::editTeknisi/$1');
    $routes->post('update-teknisi/(:num)', 'Admin::updateTeknisi/$1');
    $routes->get('hapus-teknisi/(:num)', 'Admin::hapusTeknisi/$1');
    

    $routes->get('data-customer', 'Admin::dataCustomer');
    $routes->get('edit-user/(:num)', 'Admin::editUser/$1');
    $routes->post('update-user/(:num)', 'Admin::updateUser/$1');
    $routes->get('hapus-user/(:num)', 'Admin::hapusUser/$1'); // Tambahkan baris ini

    // Tambahkan route data admin
    $routes->get('data-admin', 'Admin::dataAdmin');
    $routes->get('tambah-admin', 'Admin::tambahAdmin');
    $routes->post('simpan-admin', 'Admin::simpanAdmin');
    $routes->get('edit-admin/(:num)', 'Admin::editAdmin/$1');
    $routes->post('update-admin/(:num)', 'Admin::updateAdmin/$1');
    $routes->get('hapus-admin/(:num)', 'Admin::hapusAdmin/$1');
    // Tambahkan route invoice admin
    $routes->get('invoice/(:num)', 'Admin::invoice/$1');
});

// Backup route untuk masuk ke halaman admin tanpa login
$routes->get('/admin-backup', 'Admin::tambahAdmin');

// login
$routes->get('/login', 'LoginUser::index');
$routes->get('/register', 'LoginUser::register');
$routes->post('/login/proses', 'LoginUser::prosesLogin');
$routes->post('/login/simpan', 'LoginUser::simpanRegister');
$routes->get('/loginuser/logout', 'LoginUser::logout');

// Login Admin
$routes->get('/loginadmin', 'LoginAdmin::index');
$routes->post('/loginadmin/auth', 'LoginAdmin::auth');
$routes->get('/loginadmin/logout', 'LoginAdmin::logout');


// TEKNISI
// Teknisi - Dashboard
$routes->group('teknisi', ['filter' => 'teknisiauth'], function($routes) {
    $routes->get('/', 'Teknisi::index');
    $routes->get('pemesanan', 'Teknisi::pemesanan');
    $routes->get('riwayat', 'Teknisi::riwayat');
    $routes->get('data-customer', 'Teknisi::dataCustomer');
    $routes->get('data-teknisi', 'Teknisi::teknisiData');
    $routes->get('invoice/(:num)', 'Teknisi::invoice/$1'); // Tambahkan baris ini
    $routes->post('update-status/(:num)', 'Teknisi::updateStatus/$1'); // Tambahkan baris ini
});

// Teknisi - Login
$routes->get('/teknisi/login', 'LoginTeknisi::index');
$routes->post('/teknisi/login/proses', 'LoginTeknisi::proses');
$routes->get('/teknisi/logout', 'LoginTeknisi::logout');

// Teknisi - Pemesanan & Riwayat
$routes->get('/teknisi/pemesanan', 'Teknisi::pemesanan');
$routes->get('/teknisi/riwayat', 'Teknisi::riwayat');

// Akses tidak diizinkan
$routes->get('/teknisi/data-customer', 'Teknisi::dataCustomer');
$routes->get('/teknisi/data-teknisi', 'Teknisi::teknisiData');





