<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;



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

Route::get('/', 'IndexController')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group([
    'as' => 'homework.',
    'namespace' => 'Homework',
    'prefix' => '/homework'],
    function(Router $route){
        $route->get('/','HomeworkController@index')->name('index');
        $route->get('/customer','CustomerController@create')->name('customer_create');
        $route->post('/customer','CustomerController@store')->name('customer_store');

        $route->get('/categories_show','CategoryController@categories_show')->name('categories_show');

        $route->get('/products_show/{category_id}','ProductController@products_show')->name('products_show');
        $route->get('/product_show/{id}','ProductController@product_show')->name('product_show');

        $route->get('/users_show','UserController@users_show')->name('users_show');
        $route->get('/user_show/{id}','UserController@user_show')->name('user_show');

        $route->get('/orders_show','OrderController@orders_show')->name('orders_show');
        $route->get('/order_show/{id}','OrderController@order_show')->name('order_show');

        $route->get('/product','ProductController@create')->name('product_create');
        $route->post('/product','ProductController@store')->name('product_store');
        $route->get('/service','ServiceController@create')->name('service_create');
        $route->post('/service','ServiceController@store')->name('service_store');

});




