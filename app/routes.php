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
Route::group(['before' => 'auth|csrf'], function() {
    Route::controller('admin/dashboard', 'AdminDashboardController');
    Route::controller('admin/pages', 'AdminPageController');
});

/* Temp logout route */
Route::get('admin/logout', function() {
    Sentry::logout();
    return Redirect::to('admin/login');
});

Route::controller('admin', 'LoginController');
Route::any('{slug}', 'PageController@setPage')->where('slug', '(.*)');