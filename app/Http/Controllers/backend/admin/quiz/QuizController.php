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

    public function add(Request $request){
        $objQuiztype = new Quiztype();
        $data['quiz_type'] = $objQuiztype->get_quiz_type_list();

        $data['title'] = 'Add Quiz - '. Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Add Quiz - '. Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Add Quiz - '. Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'js/pages/crud/forms/widgets/select2.js',
            'js/pages/crud/file-upload/image-input.js',
            'js/pages/crud/forms/widgets/bootstrap-timepicker.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'quiz.js',
        );
        $data['funinit'] = array(
            'Quiz.add()',
        );
        $data['header'] = array(
            'title' => 'Add Quiz',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Dashboard' => route('admin-quiz-list'),
                'Add Quiz' => 'Add Quiz',
            )
        );
        return view('backend.pages.admin.quiz.add', $data);
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
