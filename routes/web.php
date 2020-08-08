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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'SiteController@index')->name('site_index');

Route::group(['prefix' => '/'], function () {

    // Admin Panel
    Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {

        Route::redirect('/', '/admin/home');

        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => '/post', 'middleware' => 'auth'], function () {
            Route::get('/', 'PostController@index')->name('post_index');
            Route::post('/create', 'PostController@create')->name('post_create');
            Route::get('/update/{id}', 'PostController@update')->name('post_update');
            Route::post('/store', 'PostController@store')->name('post_store');
            Route::post('/delete', 'PostController@delete')->name('post_delete');
        });

        Route::group(['prefix' => '/category', 'middleware' => 'auth'], function () {
            Route::get('/', 'CategoryController@index')->name('category_index');
            Route::post('/create', 'CategoryController@create')->name('category_create');
            Route::get('/update/{id}', 'CategoryController@update')->name('category_update');
            Route::post('/store', 'CategoryController@store')->name('category_store');
            Route::post('/delete', 'CategoryController@delete')->name('category_delete');
        });
    });
});

Auth::routes();

Route::view('/profile', 'profile');

Route::get('/article/{id}', 'PostController@detail')->name('post_detail');

Route::get('/category/{id}', 'PostController@byCategory')->name('post_cat');
Route::get('/contact', 'SiteController@contact')->name('site_contact');
