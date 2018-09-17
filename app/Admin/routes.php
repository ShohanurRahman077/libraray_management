<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/category', 'CategoryController');
    $router->resource('/category_wise_books', 'CategoryWiseBooksController');
    $router->resource('/distributied_books', 'DistributiedBooksController');

    /* $router->get('/category/create', 'CategoryController@create');
     $router->get('/category/edit', 'CategoryController@edit');*/



});
