<?php

use Illuminate\Support\Facades\Route;


$prefix = 'users';
Route::group(['prefix' => $prefix, 'middleware' => ['users']], function() {
    // quiz-list
    Route::match(['get','post'],'quiz-list',['as'=>'quiz-list','uses'=>'frontend\quiz\QuizController@quiz_list']);
});

?>
