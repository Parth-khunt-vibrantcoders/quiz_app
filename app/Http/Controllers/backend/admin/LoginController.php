<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            ccd($request->input());
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
        return redirect()->route('admin');
    }

    public function resetGuard() {
        Auth::logout();
        Auth::guard('admin')->logout();
    }

}
