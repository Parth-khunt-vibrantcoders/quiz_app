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


Route::match(['get', 'post'], 'my-login', ['as' => 'my-login', 'uses' => 'backend\admin\LoginController@login']);
Route::match(['get', 'post'], 'admin-logout', ['as' => 'admin-logout', 'uses' => 'backend\admin\LoginController@logout']);

$prefix = 'admin';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    // Dashboard
    Route::match(['get', 'post'], 'my-dashboard', ['as' => 'my-dashboard', 'uses' => 'backend\admin\dashboard\DashboardController@dashboard']);
    // Dashboard

});

$prefix = 'profile';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    // Dashboard
    Route::match(['get', 'post'], 'edit-profile', ['as' => 'edit-profile', 'uses' => 'backend\admin\dashboard\DashboardController@editProfile']);
    // Dashboard
    Route::match(['get', 'post'], 'change-password', ['as' => 'change-password', 'uses' => 'backend\admin\dashboard\DashboardController@changePassword']);
});
