<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/shop', 'HomeController@shop')->name('home.shop');
Route::get('/shop-details/{id}','HomeController@shop_details')->name('home.shop_details');
Route::get('/shop-category/{id}','HomeController@shop_category')->name('home.shop_category');
Route::get('/shop-cart','HomeController@shop_cart')->name('home.shop_cart');
Route::get('/contact','HomeController@contact')->name('home.contact');
Route::get('/check-out','HomeController@check_out')->name('home.check_out');
Route::get('/blog-details/{id}','HomeController@blog_details')->name('home.blog_details');
Route::get('/blog','HomeController@blog')->name('home.blog');

Route::get('/info-customer','InfoCustomer@index')->name('info_customer.index');
Route::post('/info-customer/update','InfoCustomer@update')->name('info_customer.update');

// Route::get('/category', function(){
//     return view('shop-category');
// });
// Route::get('/register', function(){
//     return view('admin.login.register');
// });
// Route::get('/login', 'LoginController@index')->name('login.index');
// Route::post('/login/store', 'LoginController@store')->name('login.store');

route::get('/register','LoginController@register')->name('register.index');
route::post('/register/storeRegister','LoginController@storeRegister')->name('register.store');
route::get('/login', 'LoginController@index')->name('login.index')->middleware('checkLogout');
route::post('/login/store', 'LoginController@store')->name('login.store');
route::get('/logout', 'LoginController@logout')->name('login.out');


Route::middleware(['auth','admin'])->prefix("/admin")->group(function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/get_monthly_account_data/{year}', 'AdminController@getMonthlyAccountData')->name('admin.getMonthlyAccountData');
    Route::get('/sale_datas/{from}/{to}', 'AdminController@getMonthlySaleData')->name('admin.getMonthlySaleData');
    
    Route::resources([
        'account' => 'AccountController',
        'blog' => 'BlogController',
        'category' => 'CategoryController',
        'order' => 'OrderController',
        'product' => 'ProductController',
        'rate' => 'RateController',
        'role' => 'RoleController',
        'sale' => 'SaleController',
    ]);
});

Route::group(['prefix' => 'cart'], function(){
    Route::get('view', 'CartController@view')->name('cart.view');
    Route::get('add/{id}', 'CartController@add')->name('cart.add');
    Route::get('remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('update/{id}', 'CartController@update')->name('cart.update');
    Route::get('clear', 'CartController@clear')->name('cart.clear');
});

Route::group(['prefix' => 'checkout'], function(){
    Route::get('/', 'CheckOutController@form')->name('checkout');
    Route::post('/', 'CheckOutController@submit_form')->name('checkout');
    Route::get('/checkoutsuccess', 'CheckOutController@success')->name('checkout.success');
});