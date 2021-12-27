<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countusers extends Model
{
    use HasFactory;
    protected $table = 'count_users';

    public function add_ip($addId){
        $ip = $this->get_client_ip();
        $count = Countusers::where('count_users.ip', $ip)->where('count_users.date', date('Y-m-d'))->where('count_users.add_id', $addId)->count();
        if($count == 0){
            $obCountusers = new Countusers();
            $obCountusers->ip = $ip;
            $obCountusers->add_id = $addId;
            $obCountusers->date = date('Y-m-d');
            $obCountusers->created_at = date('Y-m-d H:i:s');
            $obCountusers->updated_at = date('Y-m-d H:i:s');
            return $obCountusers->save();
        }
        return 'true';
    }

    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
