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

    function add_user_ip($addId){
        $objCountusers =new Countusers();
        $res = $objCountusers->add_ip($addId);
        if($res){

        }else{
            add_user_ip($addId);
        }
    }

    function getLocationInfoByIp(){
        $purpose = "country";
        $deep_detect = TRUE;
        $ip = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ip = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ip = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ip = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ip = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ip = getenv('REMOTE_ADDR');
        else
            $ip = 'UNKNOWN';
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
        // ccd($output);
    }
?>
