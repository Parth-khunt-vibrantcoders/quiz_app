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
Route::match(['get','post'],'get-started',['as'=>'get-started','uses'=>'frontend\home\HomeController@get_started']);
Route::match(['get','post'],'quiz-start',['as'=>'quiz-start','uses'=>'frontend\home\HomeController@quizstart']);
Route::match(['get','post'],'sign-in',['as'=>'sign-in','uses'=>'frontend\login\LoginController@login']);
Route::match(['get','post'],'sign-up',['as'=>'sign-up','uses'=>'frontend\login\LoginController@register']);
Route::match(['get','post'],'page-not-found',['as'=>'page-not-found','uses'=>'frontend\home\HomeController@pagenotfound']);
Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'frontend\login\LoginController@logout']);
Route::match(['get','post'],'quiz-rules',['as'=>'quiz-rules','uses'=>'frontend\quiz\QuizController@quiz_rules']);
Route::match(['get','post'],'privacy-policy',['as'=>'privacy-policy','uses'=>'frontend\quiz\QuizController@privacy_policy']);
Route::match(['get','post'],'terms-conditions',['as'=>'terms-conditions','uses'=>'frontend\quiz\QuizController@terms_conditions']);
Route::match(['get','post'],'contact-us',['as'=>'contact-us','uses'=>'frontend\quiz\QuizController@contact_us']);
Route::match(['get','post'],'partner-us',['as'=>'partner-us','uses'=>'frontend\quiz\QuizController@partner_us']);
$prefix = 'users';
Route::group(['prefix' => $prefix], function() {
    // quiz-list
    Route::match(['get','post'],'quiz-list',['as'=>'quiz-list','uses'=>'frontend\quiz\QuizController@quiz_list']);
});

$prefix = 'contest';
Route::group(['prefix' => $prefix], function() {
    Route::match(['get','post'],'join-contest/{slug}',['as'=>'join-contest','uses'=>'frontend\joincontest\JoincontestController@joincontest']);
    Route::match(['get','post'],'play-contest/{slug}',['as'=>'play-contest','uses'=>'frontend\joincontest\JoincontestController@playcontest']);

    Route::match(['get','post'],'quiz-result',['as'=>'quiz-result','uses'=>'frontend\quiz\QuizController@quiz_result']);
});
