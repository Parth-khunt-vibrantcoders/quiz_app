<?php

namespace App\Http\Controllers\backend\admin\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Landingpageimage;
class ImageController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('admin');
    }

    public function image (Request $request){
        if($request->isMethod('post')){
            $objLandingpageimage = new Landingpageimage();
            $result= $objLandingpageimage->update_image($request);
            if ($result) {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Landing page image successfully updated.';
                $return['redirect'] = route('landing-page-background-image');
            } else {

                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong';

            }
            echo json_encode($return);
            exit;
        }
        $objLandingpageimage = new Landingpageimage();
        $data['details'] = $objLandingpageimage->get_landing_page_image_details();

        $data['title'] = 'Background Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Background Image || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Background Image || '.Config::get('constants.PROJECT_NAME') ;
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
            'Bgimage.init()'
        );
        $data['header'] = array(
            'title' => 'Background Image',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Background Image' => 'Background Image',
            )
        );
        return view('backend.pages.admin.landingpage.image', $data);
    }
}
