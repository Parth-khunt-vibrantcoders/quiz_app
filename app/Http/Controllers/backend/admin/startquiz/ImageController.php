<?php

namespace App\Http\Controllers\backend\admin\startquiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Startquizimage;
class ImageController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function image (Request $request){
        if($request->isMethod('post')){
            $objStartquizimage = new Startquizimage();
            $result= $objStartquizimage->update_image($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Result page image successfully updated.';
                $return['redirect'] = route('start-quiz-image');
            } else {

                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';

            }
            echo json_encode($return);
            exit;
        }

        $objStartquizimage = new Startquizimage();
        $data['details'] = $objStartquizimage->get_start_quiz_image_details();

        $data['title'] = 'Start Quiz Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Start Quiz Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Start Quiz Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'js/pages/crud/forms/widgets/select2.js',
            'js/pages/crud/file-upload/image-input.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'startquiz.js'
        );
        $data['funinit'] = array(
            'Startquiz.init()'
        );
        $data['header'] = array(
            'title' => 'Start Quiz Image',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Start Quiz Image' => 'Start Quiz Image',
            )
        );
        return view('backend.pages.admin.startquiz.image', $data);
    }
}
