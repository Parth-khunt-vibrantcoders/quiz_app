<?php

namespace App\Http\Controllers\frontend\quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Quiztype;
use App\Models\Landingpageimage;
use App\Models\Resultpageimage;
use App\Models\Users;
use App\Models\Cmspages;
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

    public function quiz_rules(Request $request){
        if($request->get('id')){

            $objCmspages  = new Cmspages();
            $data['details'] = $objCmspages->get_cms_details('rules');

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Quiz Rules || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Quiz Rules || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Quiz Rules || '. Config::get('constants.PROJECT_NAME');
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

            return view('frontend.pages.quiz_list.quiz_rules', $data);

        }else{
            return redirect()->route('quiz-rules', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }

    public function privacy_policy(Request $request){
        if($request->get('id')){

            $objCmspages  = new Cmspages();
            $data['details'] = $objCmspages->get_cms_details('privacy');

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Privacy Policy || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Privacy Policy || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Privacy Policy || '. Config::get('constants.PROJECT_NAME');
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

            return view('frontend.pages.quiz_list.privacy_policy', $data);

        }else{
            return redirect()->route('quiz-rules', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }

    public function terms_conditions(Request $request){
        if($request->get('id')){

            $objCmspages  = new Cmspages();
            $data['details'] = $objCmspages->get_cms_details('terms');

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Terms Conditions || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Terms Conditions || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Terms Conditions || '. Config::get('constants.PROJECT_NAME');
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

            return view('frontend.pages.quiz_list.terms_conditions', $data);

        }else{
            return redirect()->route('terms-conditions', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }

    public function contact_us(Request $request){
        if($request->get('id')){

            $objCmspages  = new Cmspages();
            $data['details'] = $objCmspages->get_cms_details('contactus');

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Contact Us || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Contact Us || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Contact Us || '. Config::get('constants.PROJECT_NAME');
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

            return view('frontend.pages.quiz_list.contact_us', $data);

        }else{
            return redirect()->route('contact-us', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }

    public function partner_us(Request $request){
        if($request->get('id')){

            $objCmspages  = new Cmspages();
            $data['details'] = $objCmspages->get_cms_details('contactus');

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Partner Us || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Partner Us || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Partner Us || '. Config::get('constants.PROJECT_NAME');
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

            return view('frontend.pages.quiz_list.partner_us', $data);

        }else{
            return redirect()->route('partner-us', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }

    public function quiz_result(Request $request){

        if($request->get('id')){

            $score = 0 ;
            $score = $request->get('score');
            if($score <= 0){
                $coins = 0 ;
            }else{
                if($score > 0 &&  $score <= 20){
                    $coins = 10 ;
                }else{
                    if($score >= 21 &&  $score <= 50){
                        $coins = 30 ;
                    }else{
                        if($score >= 51 &&  $score <= 100){
                            $coins = 40 ;
                        }else{
                            if($score >= 101 &&  $score <= 200){
                                $coins = 50 ;
                            }else{
                                if($score >= 201 &&  $score <= 300){
                                    $coins = 70 ;
                                }else{
                                    if($score >= 301 &&  $score <= 400){
                                        $coins = 80 ;
                                    }else{
                                        if($score >= 401 &&  $score < 500){
                                            $coins = 90 ;
                                        }else{
                                            if($score >= 500){
                                                $coins = 100 ;
                                            }else{
                                                $coins = 0 ;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $data_coin = [];

            if (!empty(Auth()->guard('users')->user())) {
                $data_coin = Auth()->guard('users')->user();
                $total_coins = intval($data_coin['coins']) + intval($coins);
                $objUser = new Users();
                $res = $objUser->update_coins($total_coins, $data_coin['id']);
            }else{
                $total_coins = intval(session('user_coin')) + intval($coins);
                session()->put('user_coin', $total_coins);
            }


            $data['score'] = $score ;
            $data['coins'] = $coins ;
            $data['true_answer'] = $request->get('ta');
            $objResultpageimage = new Resultpageimage();
            $data['result_page_image'] = $objResultpageimage->get_result_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Quiz Result || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Quiz Result || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Quiz Result || '. Config::get('constants.PROJECT_NAME');
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

            return view('frontend.pages.quiz_list.quiz_result', $data);
        }else{
            return redirect()->route('quiz-list', 'id='.Config::get('constants.DEFULT_ID'));
        }
    }
}
