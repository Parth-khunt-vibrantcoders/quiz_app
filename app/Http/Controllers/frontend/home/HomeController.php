<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Landingpagequestion;
use App\Models\Landingpageimage;

class HomeController extends Controller
{
    //
    public function pagenotfound(Request $request){
        return view('errors.404');
    }

    public function home(Request $request){
        return redirect()->route('get-started');
    }

    public function get_started(Request $request){

        if($request->get('id')){

            $objLandingpagequestion = new Landingpagequestion();
            $data['question_list'] = $objLandingpagequestion->get_landing_page_question();

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

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
                'landingpage.js'
            );
            $data['funinit'] = array(
                'Landingpage.init()'
            );

            return view('frontend.pages.home.home', $data);
        }else{
            return redirect()->route('get-started', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }
}
