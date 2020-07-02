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

// General Routes
Route::get('/', 'WelcomeController@index');

Route::get('/welcome', 'WelcomeController@index');

Route::post('/contactus', 'ContactUsController@store');

Route::post('/subscribe', 'SubscriptionController@store');

Route::get('/unsubscribe', 'SubscriptionController@update');

Route::get('/terms', function () {return view('outerpages.terms');});

Route::get('/blog', 'BlogController@index');

Route::get('/blog/show/{id}', 'BlogController@show');

Route::get('/welcome/team', function (){return view('outerpages.team');});


// Authorization Routes
Auth::routes(['verify' => true]);


// Restricted Routes
Route::get('/profile', 'ProfileController@show')->middleware('verified');

Route::put('/profile/update', 'ProfileController@updateProfile')->middleware('verified');

Route::put('/profile/password', 'ProfileController@updatePassword')->middleware('verified');

Route::put('/profile/banking', 'ProfileController@updateBanking')->middleware('verified');


// Editor Routes
Route::get('/blog/create', 'BlogController@create')->middleware('verified','rank:level2');

Route::get('/blog/edit/{id}', 'BlogController@edit')->middleware('verified','rank:level2');

Route::post('/blog', 'BlogController@store')->middleware('verified','rank:level2');

Route::patch('/blog', 'BlogController@update')->middleware('verified','rank:level2');

Route::delete('/blog', 'BlogController@destroy')->middleware('verified','rank:level2');


// Admin Routes
Route::get('/admin', 'AdminController@index')->middleware('verified','rank:level3');

Route::get('/admin/dashboard', 'AdminController@index')->middleware('verified','rank:level3');

Route::get('/admin/product/view', 'ProductController@show')->middleware('verified','rank:level3');

Route::get('/admin/product/create', 'ProductController@create')->middleware('verified','rank:level3');

Route::get('/admin/product/edit/{id}', 'ProductController@edit')->middleware('verified','rank:level3');

Route::post('/admin/product/store', 'ProductController@store')->middleware('verified','rank:level3');

Route::put('/admin/product/update', 'ProductController@update')->middleware('verified','rank:level3');

Route::delete('/admin/product/delete', 'ProductController@destroy')->middleware('verified','rank:level4');

Route::get('/admin/team/view', 'TeamController@show')->middleware('verified','rank:level3');

Route::get('/admin/team/create', 'TeamController@create')->middleware('verified','rank:level3');

Route::get('/admin/team/edit/{id}', 'TeamController@edit')->middleware('verified','rank:level3');

Route::post('/admin/team/store', 'TeamController@store')->middleware('verified','rank:level3');

Route::put('/admin/team/update', 'TeamController@update')->middleware('verified','rank:level3');

Route::delete('/admin/team/delete', 'TeamController@destroy')->middleware('verified','rank:level4');

Route::get('/admin/users', 'UserController@index')->middleware('verified','rank:level3');

Route::get('/admin/users/search', 'UserController@search')->middleware('verified','rank:level3');

Route::get('/admin/users/view/{id}', 'UserController@show')->middleware('verified','rank:level3');

Route::patch('/admin/users/block', 'UserController@blockUser')->middleware('verified','rank:level3');

Route::patch('/admin/users/unblock', 'UserController@unBlockUser')->middleware('verified','rank:level3');

Route::patch('/admin/users/make/admin', 'UserController@makeAdmin')->middleware('verified','rank:level4');

Route::patch('/admin/users/make/user', 'UserController@makeUser')->middleware('verified','rank:level4');

Route::patch('/admin/users/make/editor', 'UserController@makeEditor')->middleware('verified','rank:level4');

Route::put('/admin/users/update', 'UserController@update')->middleware('verified','rank:level3');

Route::get('/admin/notifications', 'ContactUsController@index')->middleware('verified','rank:level3');

Route::get('/admin/notification/view/{id}', 'ContactUsController@show')->middleware('verified','rank:level3');

Route::delete('/admin/notification', 'ContactUsController@destroy')->middleware('verified','rank:level3');

Route::get('/admin/particular/view', 'ParticularController@show')->middleware('verified','rank:level3');

Route::get('/admin/particular/create', 'ParticularController@create')->middleware('verified','rank:level3');

Route::get('/admin/particular/edit/{id}', 'ParticularController@edit')->middleware('verified','rank:level3');

Route::post('/admin/particular/store', 'ParticularController@store')->middleware('verified','rank:level3');

Route::put('/admin/particular/update', 'ParticularController@update')->middleware('verified','rank:level3');

Route::delete('/admin/particular/delete', 'ParticularController@destroy')->middleware('verified','rank:level4');

Route::get('/admin/subscriptions', 'SubscriptionController@index')->middleware('verified','rank:level3');

Route::get('/admin/subscribers', 'SubscriptionController@list')->middleware('verified','rank:level3');

Route::get('/admin/subscription/view/{id}', 'SubscriptionController@show')->middleware('verified','rank:level3');

Route::delete('/admin/subscription', 'SubscriptionController@destroy')->middleware('verified','rank:level3');

// Test Routes
Route::get('/test', function () {return ('test');});