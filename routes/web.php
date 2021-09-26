<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    echo "Cache is cleared<br>";
    Artisan::call('route:clear');
    echo "route cache is cleared<br>";
    Artisan::call('config:clear');
    echo "config is cleared<br>";
    Artisan::call('view:clear');
    echo "view is cleared<br>";
});

Route::match(['get','post'],'/',['as'=>'home','uses'=>'frontend\home\HomeController@home']);
Route::match(['get','post'],'sign-in',['as'=>'sign-in','uses'=>'frontend\login\LoginController@login']);
Route::match(['get','post'],'sign-up',['as'=>'sign-up','uses'=>'frontend\login\LoginController@register']);
Route::match(['get','post'],'page-not-found',['as'=>'page-not-found','uses'=>'frontend\home\HomeController@pagenotfound']);

