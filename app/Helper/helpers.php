<?php
use App\Models\Users;
use App\Models\Countusers;
use GuzzleHttp\Psr7\Request;

function date_formate($date){
    return date("d-m-Y", strtotime($date));
}

function remaing_days($start_date, $end_date){
    return abs(round((strtotime($start_date) - strtotime($end_date)) / (60 * 60 * 24)));
}

function find_date($days, $start_date){
    return date('Y-m-d', strtotime($days." day", strtotime($start_date)));
}

function ccd($value){
    echo "<pre>";
    print_r($value);
    die();
}

function check_value($value){
    if($value == null || $value == ''){
        return number_format(0.000, Config::get('constants.DECIMAL_POINT'), '.', '');
    }else{
        return (number_format($value, Config::get('constants.DECIMAL_POINT'), '.', ''));
    }
}

function find_average($amount, $count){
    if($amount == 0 || $count == 0){
        return number_format(0.000, Config::get('constants.DECIMAL_POINT'), '.', '');
    }
    return (number_format((($amount)/$count), Config::get('constants.DECIMAL_POINT'), '.', ''));
}

function check_id($table, $id){
    $objUsers = new Users();
    return $objUsers->check_id($table, $id);
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_users_coin($userid){
    $objUsers =  new Users();
    $res =  $objUsers->get_users_coin($userid);
    if(!empty($res)){
        return $res[0]['coins'];
    }else{
        return 1000;
    }
}

?>
