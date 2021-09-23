<?php

namespace App\Http\Controllers\backend\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('admin');
    }

    public function list(){
        print_r("Hello");
    }
}
