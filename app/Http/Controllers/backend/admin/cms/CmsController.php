<?php

namespace App\Http\Controllers\backend\admin\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cmspages;
use Config;

class CmsController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function privacypolicy (Request $request){

        if($request->isMethod('post')){
            $objCmspages  = new Cmspages();
            $result= $objCmspages->save_cms_page_details($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Privacy policy details successfully updated.';
                $return['redirect'] = route('admin-privacy-policy');
            } else {
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';
            }
            echo json_encode($return);
            exit;
        }

        $objCmspages  = new Cmspages();
        $data['details'] = $objCmspages->get_cms_details('privacy');

        $data['title'] = 'CMS - Privacy Policy || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'CMS - Privacy Policy || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'CMS - Privacy Policy || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'cms.js'
        );

        $data['funinit'] = array(
            'Cms.privacypolicy()'
        );
        $data['header'] = array(
            'title' => 'CMS - Privacy Policy',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'CMS - Privacy Policy' => 'CMS - Privacy Policy',
            )
        );
        return view('backend.pages.admin.cms.privacypolicy', $data);
    }


    public function quiz_rules (Request $request){
        if($request->isMethod('post')){
            $objCmspages  = new Cmspages();
            $result= $objCmspages->save_cms_page_details($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Quiz Rules details successfully updated.';
                $return['redirect'] = route('admin-quiz-rules');
            } else {
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';
            }
            echo json_encode($return);
            exit;
        }
        $objCmspages  = new Cmspages();
        $data['details'] = $objCmspages->get_cms_details('rules');
        $data['title'] = 'CMS - Privacy Policy || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'CMS - Privacy Policy || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'CMS - Privacy Policy || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'cms.js'
        );

        $data['funinit'] = array(
            'Cms.quizrules()'
        );
        $data['header'] = array(
            'title' => 'CMS - Quiz Rules',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'CMS - Quiz Rules' => 'CMS - Quiz Rules',
            )
        );
        return view('backend.pages.admin.cms.quiz_rules', $data);
    }
}
