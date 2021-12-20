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

    public function getdatatable(){
        $requestData = $_REQUEST;

        $columns = array(
            0 => 'partnerus.id',
            1 => 'partnerus.name',
            2 => 'partnerus.email',
            3 => 'partnerus.subject',
            4 => 'partnerus.message',
        );

        $query = Landingpagequestion ::from('partnerus')
                                ->where('partnerus.is_deleted', 'N');


        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                $flag = 0;
                foreach ($columns as $key => $value) {
                    $searchVal = $requestData['search']['value'];
                    if ($requestData['columns'][$key]['searchable'] == 'true') {
                        if ($flag == 0) {
                            $query->where($value, 'like', '%' . $searchVal . '%');
                            $flag = $flag + 1;
                        } else {
                            $query->orWhere($value, 'like', '%' . $searchVal . '%');
                        }
                    }
                }
            });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                        ->take($requestData['length'])
                        ->select('partnerus.id', 'partnerus.name', 'partnerus.email', 'partnerus.subject', 'partnerus.message')
                        ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
            $actionhtml =  '<a href="javascript:;" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon delete-partner-us" data-id="' . $row["id"] . '" title="Delete Question"><i class="fa fa-trash text-danger" ></i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['name'];
            $nestedData[] = $row['email'];
            $nestedData[] = $row['subject'];
            $nestedData[] = $row['message'];
            $nestedData[] = $actionhtml;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

    public function common_activity_user($data,$type){
        $objPartnerus = Partnerus::find($data['id']);

        if($type == 0){
            $objPartnerus->is_deleted = "Y";
        }
        $objPartnerus->updated_at = date("Y-m-d H:i:s");
        if($objPartnerus->save()){
            return true;
        }else{
            return false ;
        }
    }
}
