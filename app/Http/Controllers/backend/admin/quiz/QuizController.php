<?php

namespace App\Http\Controllers\backend\admin\quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Quiz;
use App\Models\Quiztype;
use App\Models\Quizcategory;

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

    public function ajaxcall(Request $request){

        $action = $request->input('action');

        switch ($action) {
            case 'getdatatable':

                $objQuiz = new Quiz();
                $list = $objQuiz->getdatatable();

                echo json_encode($list);
                break;
            }
    }
}
