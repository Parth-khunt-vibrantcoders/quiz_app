<?php

namespace App\Http\Controllers\frontend\login;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Session;
use Auth;
use Config;
class LoginController extends Controller
{
    //
    public function login(Request $request){
        if($request->get('id')){
            if($request->isMethod('post')){
                if (Auth::guard('users')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'user_type' => 'U' ,'is_deleted'=>'N', 'is_active'=>'Y'])) {

                    $loginData = array(
                        'email' => Auth::guard('users')->user()->email,
                        'user_type' => Auth::guard('users')->user()->user_type,
                        'id' => Auth::guard('users')->user()->id
                    );

                    Session::push('logindata', $loginData);
                    $return['status'] = 'success';
                    $return['message'] = 'Well Done login Successfully!';
                    $return['redirect'] = route('quiz-list', ['id' => $request->get('id')]);

                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Invalid Login Id/Password';
                }

                return json_encode($return);
                exit();
             }

            $data['adId'] = $request->get('id');
            $data['title'] =  'Login || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Login || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Login || '. Config::get('constants.PROJECT_NAME');
            $data['css'] = array(
            );
            $data['plugincss'] = array(
                'css/toastr/toastr.min.css'
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
            return view('frontend.pages.login.login', $data);
        }else{
            return redirect()->route('sign-in', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }

    public function register(Request $request){
        if($request->get('id')){
            if($request->isMethod('post')){
               $objUsers =  new Users();
               $result = $objUsers->add_user($request, $request->get('id'));
               if ($result == 'true') {
                    $return['status'] = 'success';
                    // $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Your registration successfully registered.';
                    $return['redirect'] = route('sign-in', ['id' => $request->get('id')]);
                } else {
                    if ($result == 'email_exits') {
                        $return['status'] = 'warning';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Email address already registered';
                    }else{
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Something goes to wrong';
                    }
                }
                echo json_encode($return);
                exit;
            }
            $data['adId'] =  $request->get('id');
            $data['title'] =  'Register || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Register || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Register || '. Config::get('constants.PROJECT_NAME');
            $data['plugincss'] = array(
                'css/toastr/toastr.min.css'
            );
            $data['pluginjs'] = array(
                'toastr/toastr.min.js',
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
        }else{
            return redirect()->route('sign-up', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }

    public function logout(Request $request) {
        if($request->get('id')){
            $adId = $request->get('id');
        }else{
            $adId = Config::get('constants.DEFULT_ID');
        }

        $this->resetGuard();
        $request->session()->forget('logindata');
        $request->session()->forget('user_coin');
        return redirect()->route('quiz-list',['id'=> $adId]);
    }

    public function resetGuard() {
        Auth::logout();
        Auth::guard('users')->logout();
    }

}
