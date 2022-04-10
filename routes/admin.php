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
Route::match(['get', 'post'], 'common-ajaxcall', ['as' => 'common-ajaxcall', 'uses' => 'backend\CommonController@ajaxcall']);
$prefix = 'admin';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'my-dashboard', ['as' => 'my-dashboard', 'uses' => 'backend\admin\dashboard\DashboardController@dashboard']);
    Route::match(['get', 'post'], 'my-dashboard-ajaxcall', ['as' => 'my-dashboard-ajaxcall', 'uses' => 'backend\admin\dashboard\DashboardController@ajaxcall']);
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

$prefix = 'start-quiz';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    // Dashboard
    Route::match(['get', 'post'], 'start-quiz-image', ['as' => 'start-quiz-image', 'uses' => 'backend\admin\startquiz\ImageController@image']);

});

$prefix = 'users';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'user-list', ['as' => 'user-list', 'uses' => 'backend\admin\users\UsersController@list']);
    Route::match(['get', 'post'], 'user-ajaxcall', ['as' => 'user-ajaxcall', 'uses' => 'backend\admin\users\UsersController@ajaxcall']);
});

$prefix = 'adsense';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'users-management-list', ['as' => 'users-management-list', 'uses' => 'backend\admin\adsense\AdsenseController@list']);
    Route::match(['get', 'post'], 'users-management-add', ['as' => 'users-management-add', 'uses' => 'backend\admin\adsense\AdsenseController@add']);
    Route::match(['get', 'post'], 'users-management-edit/{id}', ['as' => 'users-management-edit', 'uses' => 'backend\admin\adsense\AdsenseController@edit']);
    Route::match(['get', 'post'], 'users-management-ajaxcall', ['as' => 'users-management-ajaxcall', 'uses' => 'backend\admin\adsense\AdsenseController@ajaxcall']);
});
$prefix = 'quiz';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    // quiz-type

    Route::match(['get', 'post'], 'check-ip', ['as' => 'check-ip', 'uses' => 'backend\admin\quiz\QuiztypeController@checkip']);

    Route::match(['get', 'post'], 'quiz-type-list', ['as' => 'quiz-type-list', 'uses' => 'backend\admin\quiz\QuiztypeController@list']);
    Route::match(['get', 'post'], 'quiz-type-add', ['as' => 'quiz-type-add', 'uses' => 'backend\admin\quiz\QuiztypeController@add']);
    Route::match(['get', 'post'], 'quiz-type-edit/{id}', ['as' => 'quiz-type-edit', 'uses' => 'backend\admin\quiz\QuiztypeController@edit']);
    Route::match(['get', 'post'], 'quiz-type-ajaxcall', ['as' => 'quiz-type-ajaxcall', 'uses' => 'backend\admin\quiz\QuiztypeController@ajaxcall']);

    // quiz-category
    Route::match(['get', 'post'], 'quiz-category-list', ['as' => 'quiz-category-list', 'uses' => 'backend\admin\quiz\QuizcategoryController@list']);
    Route::match(['get', 'post'], 'quiz-category-add', ['as' => 'quiz-category-add', 'uses' => 'backend\admin\quiz\QuizcategoryController@add']);
    Route::match(['get', 'post'], 'quiz-category-edit/{id}', ['as' => 'quiz-category-edit', 'uses' => 'backend\admin\quiz\QuizcategoryController@edit']);
    Route::match(['get', 'post'], 'quiz-category-ajaxcall', ['as' => 'quiz-category-ajaxcall', 'uses' => 'backend\admin\quiz\QuizcategoryController@ajaxcall']);

    // quiz-category
    Route::match(['get', 'post'], 'admin-quiz-list', ['as' => 'admin-quiz-list', 'uses' => 'backend\admin\quiz\QuizController@list']);
    Route::match(['get', 'post'], 'admin-quiz-add', ['as' => 'admin-quiz-add', 'uses' => 'backend\admin\quiz\QuizController@add']);
    Route::match(['get', 'post'], 'admin-quiz-edit/{id}', ['as' => 'admin-quiz-edit', 'uses' => 'backend\admin\quiz\QuizController@edit']);
    Route::match(['get', 'post'], 'admin-quiz-view/{id}', ['as' => 'admin-quiz-view', 'uses' => 'backend\admin\quiz\QuizController@view']);
    Route::match(['get', 'post'], 'admin-quiz-ajaxcall', ['as' => 'admin-quiz-category-ajaxcall', 'uses' => 'backend\admin\quiz\QuizController@ajaxcall']);

    Route::match(['get', 'post'], 'admin-quiz-add-question/{quiz_id}', ['as' => 'admin-quiz-add-question', 'uses' => 'backend\admin\question\QuestionController@add']);
    Route::match(['get', 'post'], 'admin-quiz-edit-question/{id}', ['as' => 'admin-quiz-edit-question', 'uses' => 'backend\admin\question\QuestionController@edit']);
    Route::match(['get', 'post'], 'admin-quiz-question-ajaxcall/{quiz_id}', ['as' => 'admin-quiz-question-ajaxcall', 'uses' => 'backend\admin\question\QuestionController@ajaxcall']);


});

$prefix = 'question';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'admin-question', ['as' => 'admin-question', 'uses' => 'backend\admin\question\QuestionController@list']);
    Route::match(['get', 'post'], 'admin-question-add', ['as' => 'admin-question-add', 'uses' => 'backend\admin\question\QuestionController@addexcel']);
    Route::match(['get', 'post'], 'admin-question-ajaxcall', ['as' => 'admin-question-ajaxcall', 'uses' => 'backend\admin\question\QuestionController@ajaxcall']);
});

$prefix = 'cms';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'admin-privacy-policy', ['as' => 'admin-privacy-policy', 'uses' => 'backend\admin\cms\CmsController@privacypolicy']);
    Route::match(['get', 'post'], 'admin-quiz-rules', ['as' => 'admin-quiz-rules', 'uses' => 'backend\admin\cms\CmsController@quiz_rules']);
    Route::match(['get', 'post'], 'admin-terms-conditions', ['as' => 'admin-terms-conditions', 'uses' => 'backend\admin\cms\CmsController@terms_conditions']);
    Route::match(['get', 'post'], 'admin-contact-us', ['as' => 'admin-contact-us', 'uses' => 'backend\admin\cms\CmsController@contact_us']);
});

$prefix = 'partner-us';
Route::group(['prefix' => $prefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'admin-partner-us', ['as' => 'admin-partner-us', 'uses' => 'backend\admin\partnerus\PartnerusController@list']);
    Route::match(['get', 'post'], 'admin-partner-us-ajaxcall', ['as' => 'admin-partner-us-ajaxcall', 'uses' => 'backend\admin\partnerus\PartnerusController@ajaxcall']);
});


