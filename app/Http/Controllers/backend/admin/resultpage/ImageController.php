<?php

namespace App\Http\Controllers\backend\admin\resultpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Resultpageimage;
class ImageController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('admin');
    }

    public function image (Request $request){
        if($request->isMethod('post')){
            $objResultpageimage = new Resultpageimage();
            $result= $objResultpageimage->update_image($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Result page image successfully updated.';
                $return['redirect'] = route('result-background-image');
            } else {

                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';

            }
            echo json_encode($return);
            exit;
        }
        $objResultpageimage = new Resultpageimage();
        $data['details'] = $objResultpageimage->get_result_page_image_details();

        $data['title'] = 'Result Page Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Result Page Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Result Page Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'bgimage.js'
        );
        $data['funinit'] = array(
            'Bgimage.result()'
        );
        $data['header'] = array(
            'title' => 'Result Page Image',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Result Page Image' => 'Result Page Image',
            )
        );
        return view('backend.pages.admin.resultpage.image', $data);
    }
}
