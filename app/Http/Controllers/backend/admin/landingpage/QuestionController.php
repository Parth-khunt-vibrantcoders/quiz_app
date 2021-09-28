<?php

namespace App\Http\Controllers\backend\admin\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function question(Request $request){

        $data['title'] = 'Background Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Background Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Background Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'question.js'
        );
        $data['funinit'] = array(
            'Question.init()'
        );
        $data['header'] = array(
            'title' => 'Background Image',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Background Image' => 'Background Image',
            )
        );
        return view('backend.pages.landingpage.question', $data);
    }
}
