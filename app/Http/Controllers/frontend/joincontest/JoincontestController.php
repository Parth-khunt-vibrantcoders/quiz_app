<?php

namespace App\Http\Controllers\frontend\joincontest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Landingpageimage;
use App\Models\Users;
class JoincontestController extends Controller
{
    //

    public function joincontest(Request $request, $slug){
        $objQuiz = new Quiz();
        $data['quiz_details'] = $objQuiz->get_quiz_details($slug);
        // ccd($data['quiz_details'][0]['fee']);
        $objLandingpageimage = new Landingpageimage();
        $data['image'] = $objLandingpageimage->get_landing_page_image_details();

        $data['adid'] = $request->get('id');
        $data['title'] =  'Join Contest || '. Config::get('constants.PROJECT_NAME');
        $data['description'] =  'Join Contest || '. Config::get('constants.PROJECT_NAME');
        $data['keywords'] =  'Join Contest || '. Config::get('constants.PROJECT_NAME');
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
        );
        $data['js'] = array(
            // 'joincontest.js'
        );
        $data['funinit'] = array(
            // 'Joincontest.init()'
        );

        return view('frontend.pages.joincontest.joincontest', $data);
    }

    public function playcontest(Request $request, $slug){
        $objQuiz = new Quiz();
        $data['quiz_details'] = $objQuiz->get_quiz_details($slug);

        if($data['quiz_details'][0]['fee'] > session('user_coin')){
            $data['adid'] = $request->get('id');
            $data['title'] =  'Not Enough Coins || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Not Enough Coins || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Not Enough Coins || '. Config::get('constants.PROJECT_NAME');
            return view('frontend.pages.joincontest.not_enough', $data);
        }else{
            $data_coin = [];

            if (!empty(Auth()->guard('users')->user())) {
                $data_coin = Auth()->guard('users')->user();
            }


            if(!empty($data_coin)){
                $coins = intval($data_coin['coins']) - intval($data['quiz_details'][0]['fee']);
                $objUser = new Users();
                $res = $objUser->update_coins($coins, $data_coin['id']);
            }else{
                $coins = intval(session('user_coin')) - intval($data['quiz_details'][0]['fee']);
                $request->session()->forget('user_coin');
                session(['user_coin' => $coins ]);
            }



            $objQuestion = new Question();
            $data['question_list'] = $objQuestion->get_quiz_details($slug);

            $objLandingpageimage = new Landingpageimage();
            $data['image'] = $objLandingpageimage->get_landing_page_image_details();

            $data['adid'] = $request->get('id');
            $data['title'] =  'Join Contest || '. Config::get('constants.PROJECT_NAME');
            $data['description'] =  'Join Contest || '. Config::get('constants.PROJECT_NAME');
            $data['keywords'] =  'Join Contest || '. Config::get('constants.PROJECT_NAME');
            $data['css'] = array(
            );
            $data['plugincss'] = array(
            );
            $data['pluginjs'] = array(

            );
            $data['js'] = array(
                'joincontest.js',
                // 'timer.js'
            );
            $data['funinit'] = array(
                'Joincontest.init()'
            );

            return view('frontend.pages.joincontest.playcontest', $data);
        }
    }
}
