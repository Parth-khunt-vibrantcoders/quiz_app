<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use Config;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'user_type' => 'A' ,'is_deleted'=>'N', 'is_active'=>'Y'])) {

                $loginData = array(
                    'first_name' => Auth::guard('admin')->user()->first_name,
                    'last_name' => Auth::guard('admin')->user()->last_name,
                    'full_name' => Auth::guard('admin')->user()->full_name,
                    'email' => Auth::guard('admin')->user()->email,
                    'user_type' => Auth::guard('admin')->user()->user_type,
                    'usertype' => Auth::guard('admin')->user()->usertype,
                    'id' => Auth::guard('admin')->user()->id
                );

                Session::push('logindata', $loginData);
                $return['status'] = 'success';
                $return['message'] = 'Well Done login Successfully!';
                $return['redirect'] = route('my-dashboard');

            } else {
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Invalid Login Id/Password';
            }

            return json_encode($return);
            exit();
        }
        $data['title'] =  'My Login || '. Config::get('constants.PROJECT_NAME');
        $data['description'] =  'My Login || '. Config::get('constants.PROJECT_NAME');
        $data['keywords'] =  'My Login || '. Config::get('constants.PROJECT_NAME');
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
            'login.js',
        );
        $data['funinit'] = array(
            'Login.init()',
        );
        return view('backend.pages.login.login', $data);
    }

    public function logout(Request $request) {
        $this->resetGuard();
        $request->session()->forget('logindata');
        return redirect()->route('my-login');
    }

    public function resetGuard() {
        Auth::logout();
        Auth::guard('admin')->logout();
    }

}
