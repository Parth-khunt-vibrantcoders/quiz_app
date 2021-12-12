<?php

namespace App\Http\Controllers\frontend\quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Quiztype;
use App\Models\Landingpageimage;
use App\Models\Resultpageimage;
use App\Models\Users;
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

            return view('frontend.pages.quiz_list.quiz_rules', $data);

        }else{
            return redirect()->route('quiz-rules', 'id='.Config::get('constants.DEFULT_ID'));
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
                                        if($score >= 401 &&  $score <= 500){
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
            }

            if(!empty($data_coin)){
                $coins = intval($data_coin['coins']) + intval($coins);
                $objUser = new Users();
                $res = $objUser->update_coins($coins, $data_coin['id']);
            }else{
                $coins = intval(session('user_coin')) + intval($coins);
            }

            session(['user_coin' => $coins]);

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
