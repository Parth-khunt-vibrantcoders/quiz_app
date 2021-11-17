<?php

namespace App\Http\Controllers\backend\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Config;
class UsersController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('admin');
    }

    public function list(Request $request){
        $data['title'] = 'Users list || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Users list || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Users list || '.Config::get('constants.PROJECT_NAME') ;
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
            'users.js'
        );
        $data['funinit'] = array(
            'Users.init()'
        );
        $data['header'] = array(
            'title' => 'Users list',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Users list' => 'Users list',
            )
        );
        return view('backend.pages.admin.users.list', $data);
    }

    public function ajaxcall(Request $request){
        $action = $request->input('action');

        switch ($action) {


            case 'getdatatable':

                $objUsers = new Users();
                $list = $objUsers->getdatatable();

                echo json_encode($list);
                break;

            case 'active-user':

                $objUsers = new Users();
                $result = $objUsers->common_activity_user($request->input('data'),1);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'User successfully actived';
                    $return['redirect'] = route('user-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;



            case 'deactive-user':

                $objUsers = new Users();
                $result = $objUsers->common_activity_user($request->input('data'),2);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'User successfully deactived';
                    $return['redirect'] = route('user-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            case 'delete-user':

                $objUsers = new Users();
                $result = $objUsers->common_activity_user($request->input('data'),0);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'User successfully deleted';
                    $return['redirect'] = route('user-list');
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
