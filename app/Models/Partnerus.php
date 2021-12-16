<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Config;
class Partnerus extends Model
{
    use HasFactory;
    protected $table = 'partnerus';

    public function add_partner_us($requet){
        $objPartnerus = new Partnerus();
        $objPartnerus->name = $requet->input('name');
        $objPartnerus->email = $requet->input('email');
        $objPartnerus->subject = $requet->input('subject');
        $objPartnerus->message = $requet->input('message');
        $objPartnerus->is_deleted = 'N';
        $objPartnerus->created_at = date('Y-m-d H:i:s');
        $objPartnerus->updated_at = date('Y-m-d H:i:s');
        return $objPartnerus->save();
    }
}
