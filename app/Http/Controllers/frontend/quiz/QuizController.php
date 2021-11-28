<?php

namespace App\Http\Controllers\frontend\quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Quiztype;
use App\Models\Landingpageimage;
class QuizController extends Controller
{
    //


    public function quiz_list(Request $request){
        if($request->get('id')){
            $objQuiztype = new Quiztype();
            $data['quiz_type'] = $objQuiztype->get_quiz_type_frontend_list();

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Quiz list || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Quiz list || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Quiz list || '. Config::get('constants.PROJECT_NAME');
            $data['css'] = array(
            );
            $data['plugincss'] = array(
            );
            $data['pluginjs'] = array(
            );
            $data['js'] = array(
                'quiz_list.js'
            );
            $data['funinit'] = array(
                'Quizlist.init()'
            );

            return view('frontend.pages.quiz_list.quiz_list', $data);

        }else{
            return redirect()->route('quiz-list', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }
}
