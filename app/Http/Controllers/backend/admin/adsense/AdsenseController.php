<?php

namespace App\Http\Controllers\backend\admin\adsense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
class AdsenseController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('admin');
    }

    public function list(Request $request){

        $data['title'] = 'Adsense users list || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Adsense users list || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Adsense users list || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css',
            'plugins/custom/datatables/datatables.bundle.css'
        );
        $data['pluginjs'] = array(
            'plugins/toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
            'plugins/custom/datatables/datatables.bundle.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'adsense.js'
        );
        $data['funinit'] = array(
            'Adsense.init()'
        );
        $data['header'] = array(
            'title' => 'Adsense users list',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Adsense users list' => 'Adsense users list',
            )
        );
        return view('backend.pages.admin.adsense.list', $data);
    }

    public function add(Request $request){

        if($request->isMethod('post')){
            $objadsense = new adsense();
            $result= $objadsense->add_adsense($request);
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


        $data['title'] = 'Add Adsense Users || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Add Adsense Users || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Add Adsense Users || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'adsense.js'
        );
        $data['funinit'] = array(
            'Adsense.add()'
        );
        $data['header'] = array(
            'title' => 'Add Adsense Users',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Adsense Users' => route('adsense-management-list'),
                'Add Adsense Users' => 'Add Adsense Users',
            )
        );
        return view('backend.pages.admin.adsense.add', $data);
    }
}
