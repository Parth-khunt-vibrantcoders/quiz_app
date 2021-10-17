<?php

namespace App\Http\Controllers\backend\admin\quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Quiz;

class QuizController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function list(Request $request){

        $data['title'] = 'Quiz List - '. Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Quiz List - '. Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Quiz List - '. Config::get('constants.PROJECT_NAME') ;
        $data['css'] = array(
        );
        $data['plugincss'] = array(
            'plugins/custom/datatables/datatables.bundle.css'
        );
        $data['pluginjs'] = array(
            'plugins/custom/datatables/datatables.bundle.js',
            'js/pages/crud/datatables/data-sources/html.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'quiz.js',
        );
        $data['funinit'] = array(
            'Quiz.init()',
        );
        $data['header'] = array(
            'title' => 'Quiz List',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Quiz List' => 'Quiz List',
            )
        );
        return view('backend.pages.admin.quiz.list', $data);
    }
}
