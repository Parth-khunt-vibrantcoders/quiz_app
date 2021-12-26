<?php

namespace App\Http\Controllers\backend\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adsense;
use App\Models\Users;
use App\Models\Quiz;
use App\Models\Question;
use Config;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard() {
        $objAdsense = new Adsense();
        $data['adsense_list'] = $objAdsense->get_count_adsense();

        $objUsers = new Users();
        $data['users_list'] = $objUsers->get_count_users();

        $objQuiz = new Quiz();
        $data['quiz_list'] = $objQuiz->get_count_quiz();

        $objQuestion = new Question();
        $data['question_list'] = $objQuestion->get_count_question();

        $data['title'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
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
            'dashboard.js'
        );
        $data['funinit'] = array(
            'Dashboard.init()'
        );
        $data['header'] = array(
            'title' => 'My Dashboard',
            'breadcrumb' => array(
                'My Dashboard' => 'My Dashboard',
            )
        );
        return view('backend.pages.admin.dashboard.dashboard', $data);
    }

    public function editProfile (Request $request) {
        if ($request->isMethod('post')) {
            $objUsers = new Users();
            $result = $objUsers->edit_profile($request);
            if ($result == "true") {
                $return['status'] = 'success';
                 $return['jscode'] = '$("#loader").hide();';
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
        return view('backend.pages.admin.profile.editProfile', $data);
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
        return view('backend.pages.admin.profile.changepassword', $data);
    }

    public function ajaxcall(Request $request){
        $action = $request->input('action');

        switch ($action) {


            case 'getdatatable':

                $objAdsense = new Adsense();
                $list = $objAdsense->getdatatable_uers();

                echo json_encode($list);
                break;
            }
    }
}
