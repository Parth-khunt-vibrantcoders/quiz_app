<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Landingpagequestion;
use App\Models\Landingpageimage;
use App\Models\Startquizimage;

class HomeController extends Controller
{
    //
    public function pagenotfound(Request $request){
        return view('errors.404');
    }

    public function home(Request $request){
        if($request->get('id')){
            $adId = $request->get('id');
        }else{
            $adId = Config::get('constants.DEFULT_ID');
        }
        return redirect()->route('get-started', ['id' => $adId]);
    }

    public function get_started(Request $request){

        if($request->get('id')){

            $objLandingpagequestion = new Landingpagequestion();
            $data['question_list'] = $objLandingpagequestion->get_landing_page_question();

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');

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

    public function quizstart(Request $request){

        if($request->get('id')){

            $objStartquizimage = new Startquizimage();
            $data['details'] = $objStartquizimage->get_start_quiz_image_details();

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();
            $data['title'] =  'Start Quiz || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Start Quiz || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Start Quiz || '. Config::get('constants.PROJECT_NAME');
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

            return view('frontend.pages.start_quiz.start_quiz', $data);
        }else{
            return redirect()->route('quiz-start', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }
}
