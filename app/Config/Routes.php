<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// FRONTEND
$routes->get('login', 'Auth::login');
$routes->get('google/login', 'GoogleAuth::login');
$routes->get('google/callback', 'GoogleAuth::callback');
$routes->get('logout', 'Auth::logout');

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('products', 'Products::index');
$routes->get('product/(:segment)','Products::detail/$1');
$routes->get('shop', 'Products::index');

$routes->get('category/(:segment)', 'Products::category/$1');

$routes->get('blogs', 'Blogs::index');
$routes->get('blog/(:segment)', 'Blogs::detail/$1');

$routes->get('about', 'Page::about');
$routes->get('privacy', 'Page::privacy');
$routes->get('terms', 'Page::terms');

$routes->post('cart/addajax', 'Cart::addajax');
$routes->get('cart', 'Cart::index');
$routes->post('cart/update', 'Cart::update');
$routes->get('cart/remove/(:num)', 'Cart::remove/$1');

$routes->get('checkout', 'Checkout::index');
$routes->post('checkout/process', 'Checkout::process');

$routes->get('payment/(:num)', 'Payment::index/$1');
$routes->post('payment/notification', 'Payment::notification');
$routes->get('payment/notification', 'Payment::notification');
$routes->post('payment/update-status', 'Payment::updateStatus');

$routes->get('order/success/(:segment)', 'Order::success/$1');
$routes->get('order', 'Order::index');
$routes->get('order/(:segment)', 'Order::detail/$1');

// LOGIN ADMIN
$routes->get('admin', 'Admin\Auth::index');
$routes->post('login', 'Admin\Auth::login');
$routes->get('crdpswd', 'Admin\Auth::pwd');

// HALAMAN ADMIN (WAJIB LOGIN)
$routes->group('', ['filter' => 'jwt'], function ($routes) {

    $routes->get('admin/dashboard', 'Admin\Dashboard::index');
    //Category
    $routes->get('admin/category', 'Admin\Category::index');
    $routes->get('admin/category/add', 'Admin\Category::add');
    $routes->post('category/save', 'Admin\Category::save');
    $routes->get('admin/category/edit/(:num)', 'Admin\Category::edit/$1');
    $routes->post('category/update/(:num)', 'Admin\Category::update/$1');
    $routes->get('category/getData', 'Admin\Category::getData');
    $routes->get('admin/category/deactivate/(:num)','Admin\Category::deactivate/$1');
    $routes->get('admin/category/activate/(:num)','Admin\Category::activate/$1');

    //Product
    $routes->get('admin/product', 'Admin\Product::index');
    $routes->get('admin/product/add', 'Admin\Product::add');
    $routes->post('product/save', 'Admin\Product::save');
    $routes->get('admin/product/edit/(:num)', 'Admin\Product::edit/$1');
    $routes->post('product/update/(:num)', 'Admin\Product::update/$1');
    $routes->get('product/getData', 'Admin\Product::getData');

    //Blog
    $routes->get('admin/blog', 'Admin\Blog::index');
    $routes->get('admin/blog/add', 'Admin\Blog::add');
    $routes->post('blog/save', 'Admin\Blog::save');
    $routes->get('admin/blog/edit/(:num)', 'Admin\Blog::edit/$1');
    $routes->post('blog/update/(:num)', 'Admin\Blog::update/$1');
    $routes->get('blog/getData', 'Admin\Blog::getData');
    $routes->get('admin/blog/deactivate/(:num)','Admin\Blog::deactivate/$1');
    $routes->get('admin/blog/activate/(:num)','Admin\Blog::activate/$1');

    $routes->get('admin/order', 'Admin\Order::index');
    $routes->get('admin/order/detail/(:num)', 'Admin\Order::detail/$1');
    $routes->get('admin/order/getData', 'Admin\Order::getData');

    $routes->get('admin/users', 'Admin\Users::index');
    $routes->get('admin/users/getData', 'Admin\Users::getData');
    $routes->get('admin/users/add', 'Admin\Users::create');
    $routes->post('users/save', 'Admin\Users::save');
    $routes->get('users/edit/(:num)', 'Admin\Users::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\Users::update/$1');
    $routes->get('admin/users/delete/(:num)', 'Admin\Users::delete/$1');


});


$routes->get('logout', 'Auth::logout');

// CUSTOM 404
$routes->set404Override(function () {
    return view('errors/html/error_404');
});

