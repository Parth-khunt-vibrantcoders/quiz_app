<?php

namespace App\Http\Controllers\backend\admin\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Landingpagequestion;
class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }


    public function list(Request $request){

        $data['title'] = 'Landing Pages Question || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Landing Pages Question || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Landing Pages Question || '.Config::get('constants.PROJECT_NAME') ;
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css',
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
            'question.js'
        );
        $data['funinit'] = array(
            'Question.init()'
        );
        $data['header'] = array(
            'title' => 'Landing Pages Question',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Landing Pages Question' => 'Landing Pages Question',
            )
        );
        return view('backend.pages.admin.landingpage.list', $data);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $objLandingpagequestion = new Landingpagequestion();
            $result= $objLandingpagequestion->update_image($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Landing page question successfully added.';
                $return['redirect'] = route('landing-page-background-image');
            } else {

                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';

            }
            echo json_encode($return);
            exit;
        }


        $data['title'] = 'Add landing page question || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Add landing page question || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Add landing page question || '.Config::get('constants.PROJECT_NAME') ;
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
            'Question.add()'
        );
        $data['header'] = array(
            'title' => 'Add landing page question',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Landing page question' => route('landing-page-question-list'),
                'Add landing page question' => 'Add landing page question',
            )
        );
        return view('backend.pages.admin.landingpage.add', $data);
    }
    public function edit(Request $request){
        if($request->isMethod('post')){
            $objLandingpagequestion = new Landingpagequestion();
            $result= $objLandingpagequestion->update_image($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Landing page question successfully updated.';
                $return['redirect'] = route('landing-page-background-image');
            } else {

                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';

            }
            echo json_encode($return);
            exit;
        }


        $data['title'] = 'Edit landing page question || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Edit landing page question || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Edit landing page question || '.Config::get('constants.PROJECT_NAME') ;
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
            'Question.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit landing page question',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Landing page question' => route('landing-page-question-list'),
                'Edit landing page question' => 'Edit landing page question',
            )
        );
        return view('backend.pages.admin.landingpage.edit', $data);
    }

    public function ajaxcall(Request $request){
        $action = $request->input('action');

        switch ($action) {


            case 'getdatatable':

                $objLandingpagequestion = new Landingpagequestion();
                $list = $objLandingpagequestion->getdatatable();

                echo json_encode($list);
                break;
            }
    }
}
