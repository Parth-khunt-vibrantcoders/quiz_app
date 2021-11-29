<?php

namespace App\Http\Controllers\frontend\joincontest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Quiz;
use App\Models\Landingpageimage;
class JoincontestController extends Controller
{
    //

    public function joincontest(Request $request, $slug){

        if($request->get('id')){


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
                'joincontest.js'
            );
            $data['funinit'] = array(
                'Joincontest.init()'
            );

            return view('frontend.pages.joincontest.joincontest', $data);

        }else{
            return redirect()->route('join-contest', [$slug , 'id='.Config::get('constants.DEFULT_ID')]);
        }

    }
}
