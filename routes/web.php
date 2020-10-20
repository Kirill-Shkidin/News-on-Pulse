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

use Illuminate\Support\Facades\Route;

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('/profile', 'ProfileController');

Route::get('/auth/vk', 'LoginController@loginVK')->name('loginVK');
Route::get('/auth/github', 'LoginController@loginGitHub')->name('loginGitHub');
Route::get('/auth/vk/callback', 'LoginController@callbackVK')->name('callbackVK');
Route::get('/auth/github/callback', 'LoginController@callbackGitHub')->name('callbackGitHub');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'is_admin', 'auth']], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group([
  'prefix' => 'admin',
  'namespace' => 'admin',
  'as' => 'admin.',
  'middleware' => ['auth', 'is_admin']
], function () {
  Route::get('/parser', 'ParserController@index')->name('parser');

  //CRUD News
  Route::get('/', 'NewsController@index')->name('index');
  Route::resource('/news', 'NewsController')->except(['show']);
  //CRUD Users
  Route::resource('/users', 'UsersController')->except(['show']);
  Route::get('/users/toggleAdmin/{user}', 'UsersController@toggleAdmin')->name('toggleAdmin');
});


Route::group([
  'prefix' => 'news',
  'namespace' => 'News',
  'as' => 'news.'
], function () {
  Route::get('/', 'NewsController@index')->name('index');
  Route::get('/one/{news}', 'NewsController@show')->name('one');

  Route::group([
    'prefix' => 'categories',
    'as' => 'categories.'
  ], function () {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/{slug}', 'CategoryController@showCategory')->name('one');
  });
});


Route::get('/about', 'HomeController@about')->name('about');


Auth::routes();
