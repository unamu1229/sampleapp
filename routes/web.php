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


Route::get('test2', 'TestController@index');

Auth::routes();

// Authentication Routes...
Route::get('login/admin', 'Auth\AdminLoginController@showLoginForm')->name('login.admin');
Route::post('login/admin', 'Auth\AdminLoginController@login');
Route::post('logout/admin', 'Auth\AdminLoginController@logout')->name('logout.admin');
// Registration Routes...
Route::get('register/admin', 'Auth\AdminRegisterController@showRegistrationForm')->name('register.admin');
Route::post('register/admin', 'Auth\AdminRegisterController@register')->name('register.admin_exec');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/admin', 'HomeController@admin')->name('home.admin');
