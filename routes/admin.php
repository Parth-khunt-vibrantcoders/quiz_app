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


$prefix = 'landing-page';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    // Dashboard
    Route::match(['get', 'post'], 'landing-page-background-image', ['as' => 'landing-page-background-image', 'uses' => 'backend\admin\landingpage\ImageController@image']);
    // Dashboard
    Route::match(['get', 'post'], 'landing-page-question-list', ['as' => 'landing-page-question-list', 'uses' => 'backend\admin\landingpage\QuestionController@list']);
    Route::match(['get', 'post'], 'landing-page-question-add', ['as' => 'landing-page-question-add', 'uses' => 'backend\admin\landingpage\QuestionController@add']);
    Route::match(['get', 'post'], 'landing-page-question-edit/{id}', ['as' => 'landing-page-question-edit', 'uses' => 'backend\admin\landingpage\QuestionController@edit']);
    Route::match(['get', 'post'], 'landing-page-question-ajaxcall', ['as' => 'landing-page-question-ajaxcall', 'uses' => 'backend\admin\landingpage\QuestionController@ajaxcall']);
});

$prefix = 'result-page';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    // Dashboard
    Route::match(['get', 'post'], 'result-background-image', ['as' => 'result-background-image', 'uses' => 'backend\admin\resultpage\ImageController@image']);

});

$prefix = 'users';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'user-list', ['as' => 'user-list', 'uses' => 'backend\admin\users\UsersController@list']);
    Route::match(['get', 'post'], 'user-ajaxcall', ['as' => 'user-ajaxcall', 'uses' => 'backend\admin\users\UsersController@ajaxcall']);
});

$prefix = 'adsense';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'adsense-management-list', ['as' => 'adsense-management-list', 'uses' => 'backend\admin\adsense\AdsenseController@list']);
    Route::match(['get', 'post'], 'adsense-management-add', ['as' => 'adsense-management-add', 'uses' => 'backend\admin\adsense\AdsenseController@add']);
    Route::match(['get', 'post'], 'adsense-management-edit/{id}', ['as' => 'adsense-management-edit', 'uses' => 'backend\admin\adsense\AdsenseController@edit']);
    Route::match(['get', 'post'], 'adsense-management-ajaxcall', ['as' => 'adsense-management-ajaxcall', 'uses' => 'backend\admin\adsense\AdsenseController@ajaxcall']);
});
