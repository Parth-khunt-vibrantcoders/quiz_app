<?php

namespace App\Http\Controllers\frontend\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
class LoginController extends Controller
{
    //
    public function login(Request $request){
        $data['title'] =  'Login || '. Config::get('constants.PROJECT_NAME');
        $data['description'] =  'Login || '. Config::get('constants.PROJECT_NAME');
        $data['keywords'] =  'Login || '. Config::get('constants.PROJECT_NAME');
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
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
        return view('frontend.pages.login.login', $data);
    }

    public function register(Request $request){
        $data['title'] =  'Register || '. Config::get('constants.PROJECT_NAME');
        $data['description'] =  'Register || '. Config::get('constants.PROJECT_NAME');
        $data['keywords'] =  'Register || '. Config::get('constants.PROJECT_NAME');
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
            'validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'register.js',
        );
        $data['funinit'] = array(
            'Register.init()',
        );
        return view('frontend.pages.register.register', $data);
    }
}
