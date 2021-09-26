<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
class HomeController extends Controller
{
    //
    public function pagenotfound(Request $request){
        return view('errors.404');
    }

    public function home(Request $request){
        $data['title'] =  'Home || '. Config::get('constants.PROJECT_NAME');
        $data['description'] =  'Home || '. Config::get('constants.PROJECT_NAME');
        $data['keywords'] =  'Home || '. Config::get('constants.PROJECT_NAME');
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
        );
        $data['js'] = array(
        );
        $data['funinit'] = array(
        );

        return view('frontend.pages.home.home', $data);
    }
}
