<?php

namespace App\Http\Controllers\backend\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Config;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard() {

        $data['title'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['css'] = array(
        );
        $data['plugin_css'] = array(
        );
        $data['js'] = array(
        );
        $data['plugin_js'] = array(
        );
        $data['funinit'] = array(
        );
        $data['header'] = array(
            'title' => 'My Dashboard',
            'breadcrumb' => array(
                'My Dashboard' => 'My Dashboard',
            )
        );
        return view('backend.pages.dashboard.dashboard', $data);
    }

    public function editProfile (Request $request) {
        if ($request->isMethod('post')) {
            $objUsers = new Users();
            $result = $objUsers->edit_profile($request);
            if ($result == "true") {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Your profile successfully updated.';
                $return['redirect'] = route('edit-profile');
            } else {
                if ($result == "email_exist") {
                    $return['status'] = 'error';
                     $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'The email address has already been taken.';
                }else{
                    $return['status'] = 'error';
                     $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong';
                }
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Edit Profile || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Edit Profile || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Edit Profile || '.Config::get('constants.PROJECT_NAME') ;
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
            'dashboard.js'
        );
        $data['funinit'] = array(
            'Dashboard.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Profile',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Edit Profile' => 'Edit Profile',
            )
        );
        return view('backend.pages.dashboard.editProfile', $data);
    }

    public function changePassword(Request $request){
        if ($request->isMethod('post')) {
            $objUsers = new Users();
            $result = $objUsers->change_password($request);
            if ($result == "true") {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Password successfully changed.';
                $return['redirect'] = route('admin-logout');
            } else {
                if ($result == "password_not_match") {
                    $return['status'] = 'warning';
                     $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Old Password not match with new passsword';
                }else{
                    $return['status'] = 'error';
                     $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong';
                }
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Change Password || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Change Password || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Change Password || '.Config::get('constants.PROJECT_NAME') ;
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
            'dashboard.js'
        );
        $data['funinit'] = array(
            'Dashboard.changepassword()'
        );
        $data['header'] = array(
            'title' => 'Change password',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Change password' => 'Change password',
            )
        );
        return view('backend.pages.dashboard.changepassword', $data);
    }
}
