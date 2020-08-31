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

        $route->get('/categories_show','CategoryController@categories_show')->name('categories_show');

        $route->get('/products_show/{category?}','ProductController@products_show')->name('products_show');
        $route->get('/product_show/{product}','ProductController@product_show')->name('product_show');
        $route->get('/product','ProductController@create')->name('product_create');
        $route->post('/product','ProductController@store')->name('product_store');
        $route->get('/product_update/{product}', 'ProductController@edit')->name('product_edit');
        $route->put('/product_update/{product}', 'ProductController@update')->name('product_update');
        $route->delete('/destroy', 'ProductController@destroy')->name('product_destroy');



        $route->get('/users_show','UserController@users_show')->name('users_show');
        $route->get('/user_show/{user}','UserController@user_show')->name('user_show');
        $route->get('/user','UserController@create')->name('user_create');
        $route->post('/user','UserController@store')->name('user_store');
        $route->get('/user_update/{user}', 'UserController@edit')->name('user_edit');
        $route->put('/user_update/{user}', 'UserController@update')->name('user_update');
        $route->delete('/destroy/{user}', 'UserController@destroy')->name('user_destroy');



        $route->get('/orders_show','OrderController@orders_show')->name('orders_show');
        $route->get('/order_show/{order}','OrderController@order_show')->name('order_show');
        $route->get('/service','ServiceController@create')->name('service_create');
        $route->post('/service','ServiceController@store')->name('service_store');

});




