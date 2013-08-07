<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Admin Routes
Route::group(['prefix' => 'admin','before' => 'auth'], function() {
    Route::controller('dashboard', 'AdminDashboardController');
    Route::resource('page', 'AdminPageController');
});

Route::controller('admin', 'LoginController');
Route::get('admin/logout', function() {
    Sentry::logout();
    return Redirect::to('admin/login');
});

Route::any('{slug}', 'PageController@setPage')->where('slug', '(.*)');