<?php

namespace App\Http\Controllers\backend\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard() {

        $data['title'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['keywords'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['description'] = 'My Dashboard || '.Config::get('constants.PROJECT_NAME') ;
        $data['css'] = array(
        );
        $data['plugin_css'] = array(
        );
        $data['js'] = array(
        );
        $data['plugin_js'] = array(
        );
        $data['funinit'] = array(
        );
        $data['header'] = array(
        );
        return view('backend.pages.dashboard.dashboard', $data);
    }
}
