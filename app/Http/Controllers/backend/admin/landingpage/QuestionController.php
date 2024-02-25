<?php

namespace App\Http\Controllers\backend\admin\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Landingpagequestion;
use App\Models\Users;
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
            $result= $objLandingpagequestion->add_quetion($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Landing page question successfully added.';
                $return['redirect'] = route('landing-page-question-list');
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
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'js/pages/crud/forms/widgets/select2.js',
            'js/pages/crud/file-upload/image-input.js'
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

    public function edit(Request $request, $id){

        $objLandingpagequestion = new Landingpagequestion();
        $data['details'] = $objLandingpagequestion->get_question_details($id);

        if($request->isMethod('post')){
            $objLandingpagequestion = new Landingpagequestion();
            $result= $objLandingpagequestion->edit_question($request);
            if ($result) {
                $return['status'] = 'success';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Landing page question successfully updated.';
                $return['redirect'] = route('landing-page-question-list');
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
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'js/pages/crud/forms/widgets/select2.js',
            'js/pages/crud/file-upload/image-input.js'
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


            case 'deletequestion':

                $objLandingpagequestion = new Landingpagequestion();
                $result = $objLandingpagequestion->common_activity_user($request->input('data'),0);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Question successfully deleted';
                    $return['redirect'] = route('landing-page-question-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            case 'activedeletequestion':

                $objLandingpagequestion = new Landingpagequestion();
                $result = $objLandingpagequestion->common_activity_user($request->input('data'),1);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Question successfully actived';
                    $return['redirect'] = route('landing-page-question-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            case 'deactivedeletequestion':

                $objLandingpagequestion = new Landingpagequestion();
                $result = $objLandingpagequestion->common_activity_user($request->input('data'),2);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Question successfully deactived';
                    $return['redirect'] = route('landing-page-question-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;

        }
    }
}
