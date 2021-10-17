<?php

namespace App\Http\Controllers\backend\admin\adsense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Adsense;
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
            $objadsense = new Adsense();
            $result= $objadsense->add_adsense($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Adsense users successfully added.';
                $return['redirect'] = route('users-management-list');
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
            'plugins/validate/jquery.validate.min.js',
            'js/pages/crud/forms/widgets/select2.js',
            'js/pages/crud/file-upload/image-input.js'
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
                'Adsense Users' => route('users-management-list'),
                'Add Adsense Users' => 'Add Adsense Users',
            )
        );
        return view('backend.pages.admin.adsense.add', $data);
    }

    public function edit(Request $request, $id){
        if($request->isMethod('post')){
            $objadsense = new Adsense();
            $result= $objadsense->edit_adsense($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Adsense users successfully updated.';
                $return['redirect'] = route('users-management-list');
            } else {

                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';

            }
            echo json_encode($return);
            exit;
        }

        $objadsense = new Adsense();
        $data['details']= $objadsense->get_adsense_details($id);

        $data['title'] = 'Edit Adsense Users || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Edit Adsense Users || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Edit Adsense Users || '.Config::get('constants.PROJECT_NAME') ;
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
            'adsense.js'
        );
        $data['funinit'] = array(
            'Adsense.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Adsense Users',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Adsense Users' => route('users-management-list'),
                'Edit Adsense Users' => 'Edit Adsense Users',
            )
        );
        return view('backend.pages.admin.adsense.edit', $data);
    }

    public function ajaxcall(Request $request){
        $action = $request->input('action');

        switch ($action) {


            case 'getdatatable':

                $objAdsense = new Adsense();
                $list = $objAdsense->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteadsenseusers':

                $objadsense = new Adsense();
                $result = $objadsense->common_activity_user($request->input('data'),0);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Adsense successfully deleted';
                    $return['redirect'] = route('users-management-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            case 'activeadsenseusers':

                $objadsense = new Adsense();
                $result = $objadsense->common_activity_user($request->input('data'),1);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Adsense successfully actived';
                    $return['redirect'] = route('users-management-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            case 'deactiveadsenseusers':

                $objadsense = new Adsense();
                $result = $objadsense->common_activity_user($request->input('data'),2);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Adsense successfully deactived';
                    $return['redirect'] = route('users-management-list');
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
