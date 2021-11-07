<?php

namespace App\Http\Controllers\backend\admin\question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Question;
use App\Models\Quiz;

class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function add(Request $request, $quizId){

        if ($request->isMethod('post')) {
            $ojbQuestion = new Question();
            $result = $ojbQuestion->add_question($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Question added successfully.';
                $return['redirect'] = route('admin-quiz-view', $quizId);
            } else {
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';
            }
            echo json_encode($return);
            exit;
        }
        $objQuiz = new Quiz();
        $data['quiz_details'] = $objQuiz->get_quiz_view_details($quizId);

        $data['title'] = 'Add Question- '. Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Add Question- '. Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Add Question- '. Config::get('constants.PROJECT_NAME') ;
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
            'question.js',
        );
        $data['funinit'] = array(
            'Question.add()',
        );
        $data['header'] = array(
            'title' => 'Add Question',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Quiz List' => route('admin-quiz-list'),
                'View Quiz' => route('admin-quiz-view', $quizId),
                'Add Question' => 'Add Question',
            )
        );
        return view('backend.pages.admin.question.add', $data);
    }
}
