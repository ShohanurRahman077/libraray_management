<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'SignUpController@signUp');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/borrowed_books', 'BorrowedBooksController@borrowed_books');

Route::any('/search_books', 'SearchBooksController@index');
