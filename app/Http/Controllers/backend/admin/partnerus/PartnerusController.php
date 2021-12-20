<?php

namespace App\Http\Controllers\backend\admin\partnerus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Partnerus;
class PartnerusController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function list(Request $request){

        $data['title'] = 'Partner-us List - '. Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'Partner-us List - '. Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'Partner-us List - '. Config::get('constants.PROJECT_NAME') ;
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
            'partnerus.js',
        );
        $data['funinit'] = array(
            'Partnerus.init()',
        );
        $data['header'] = array(
            'title' => 'Partner-us List',
            'breadcrumb' => array(
                'Dashboard' => route('my-dashboard'),
                'Partner-us List' => 'Partner-us List',
            )
        );
        return view('backend.pages.admin.partnerus.list', $data);
    }

    public function ajaxcall(Request $request){
        $action = $request->input('action');

        switch ($action) {


            case 'getdatatable':

                $objPartnerus = new Partnerus();
                $list = $objPartnerus->getdatatable();

                echo json_encode($list);
                break;
            case 'delete-partner-us':

                $objPartnerus = new Partnerus();
                $result = $objPartnerus->common_activity_user($request->input('data'),0);

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Partner us details successfully deleted';
                    $return['redirect'] = route('admin-partner-us');
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
