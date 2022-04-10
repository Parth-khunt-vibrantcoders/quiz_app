<?php

namespace App\Http\Controllers\backend\admin\quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Country;
class CountryController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function list(Request $request){

        $data['title'] = 'Country List - '. Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Country List - '. Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Country List - '. Config::get('constants.PROJECT_NAME') ;
        $data['css'] = array(
        );
        $data['plugincss'] = array(
            'plugins/custom/datatables/datatables.bundle.css'
        );
        $data['pluginjs'] = array(
            'plugins/custom/datatables/datatables.bundle.js',
            'js/pages/crud/datatables/data-sources/html.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'country.js',
        );
        $data['funinit'] = array(
            'Country.init()',
        );
        $data['header'] = array(
            'title' => 'Country List',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Country List' => 'Country List',
            )
        );
        return view('backend.pages.admin.country.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objCountry = new Country();
            $result = $objCountry->add_country($request);
            if ($result == 'true') {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Country added successfully.';
                $return['redirect'] = route('country-list');
            } else {
                if($result == 'country_exits') {
                    $return['status'] = 'warning';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Country already exit.';
                }else{
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong';
                }
            }
            echo json_encode($return);
            exit;

        }

        $data['title'] = 'Add Country || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Add Country || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Add Country || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'country.js',
        );
        $data['funinit'] = array(
            'Country.add()',
        );
        $data['header'] = array(
            'title' => 'Add Country',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Country List' => route('country-list'),
                'Add Country' => 'Add Country',
            )
        );
        return view('backend.pages.admin.country.add', $data);
    }

    public function edit(Request $request, $editId){
        if ($request->isMethod('post')) {

            $objCountry = new Country();
            $result = $objCountry->edit_country($request);
            if ($result == 'true') {
                $return['status'] = 'success';
                 $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Country updated successfully.';
                $return['redirect'] = route('country-list');
            } else {
                if($result == 'country_exits') {
                    $return['status'] = 'warning';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Country already exit.';
                }else{
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong';
                }
            }
            echo json_encode($return);
            exit;
        }

        $objCountry = new Country();
        $data['country_details'] = $objCountry->get_country_details($editId);

        $data['title'] = 'Edit Country || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Edit Country || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Edit Country || '.Config::get('constants.PROJECT_NAME') ;
        $data['plugincss'] = array(
            'plugins/toastr/toastr.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'country.js',
        );
        $data['funinit'] = array(
            'Country.edit()',
        );
        $data['header'] = array(
            'title' => 'Edit Country',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Country List' => route('country-list'),
                'Edit Country' => 'Edit Country',
            )
        );
        return view('backend.pages.admin.country.edit', $data);
    }

    public function ajaxcall(Request $request){

        $action = $request->input('action');

        switch ($action) {
            case 'getdatatable':

                $objCountry = new Country();
                $list = $objCountry->getdatatable();

                echo json_encode($list);
                break;

            case 'delete-country':

               $objCountry = new Country();
                $result = $objCountry->common_activity_user($request->input('data'),0);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Country successfully deleted';
                    $return['redirect'] = route('country-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            case 'active-country':

               $objCountry = new Country();
                $result = $objCountry->common_activity_user($request->input('data'),1);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Country successfully actived';
                    $return['redirect'] = route('country-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            case 'deactive-country':

               $objCountry = new Country();
                $result = $objCountry->common_activity_user($request->input('data'),2);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Country successfully deactived';
                    $return['redirect'] = route('country-list');
                } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;


            }
    }

}
