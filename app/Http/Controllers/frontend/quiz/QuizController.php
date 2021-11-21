<?php

namespace App\Http\Controllers\frontend\quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('users');
    }

    public function quiz_list(Request $request){

    }
}
