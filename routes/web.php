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
    //\Illuminate\Support\Facades\Event::forget(\App\Events\PublishProcessor::class);
    \Illuminate\Support\Facades\Event::dispatch(new \App\Events\PublishProcessor(1031));
    return view('welcome');
});


Route::get('test', 'TestController@index');

Route::get('profile', 'ProfileController@index');
Route::post('profile/edit', 'ProfileController@edit')->name('profile.edit');

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

Route::get('/user/search', 'UserController@search')->name('user.search');

Route::get('/order', function () {
    $order = \App\Order::query()->find(23);
    event(new \App\Events\ShippingStatusUpdated($order));
    return view('broadcast.test', ['orderId' => $order->id]);
});

Route::get('/login_by/{user_id}', function ($user_id) {
    $user = \App\User::query()->find($user_id);
    \Illuminate\Support\Facades\Auth::guard()->login($user);
    return 'logined';
});

Route::get('/public-event', function () {
    broadcast(new \App\Events\PublicEvent);
    return 'public';
});
