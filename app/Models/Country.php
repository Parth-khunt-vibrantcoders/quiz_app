<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'country';

    public function getdatatable(){
        $requestData = $_REQUEST;

        $columns = array(
            0 => 'country.id',
            1 => 'country.name',
            2 => 'country.status',
        );

        $query = Quiztype ::from('country')
                    ->where('country.is_deleted', 'N');


        if (!empty($requestData['search']['value'])) {
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
                        ->select('country.id', 'country.name', 'country.is_active')
                        ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {

            $actionhtml = '<a href="' . route('country-edit', $row['id']) . '" class="btn btn-icon" title="Edit Details"><i class="fa fa-edit text-warning"> </i></a>';

            if($row['is_active'] == "Y"){
                $status = '<span class="badge badge-lg badge-success badge-inline">Active</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#deactiveModel" class="btn btn-icon  deactive-country" data-id="' . $row["id"] . '" title="Deactive Question"><i class="fa fa-times text-info" ></i></a>';
            }else{
                $status = '<span class="badge badge-lg badge-danger  badge-inline">Deactive</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#activeModel" class="btn btn-icon  active-country" data-id="' . $row["id"] . '" title="Active Question"><i class="fa fa-check text-info" ></i></a>';
            }

            $actionhtml =  $actionhtml.'<a href="javascript:;" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon delete-country" data-id="' . $row["id"] . '" title="Delete Question"><i class="fa fa-trash text-danger" ></i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['name']);
            $nestedData[] = $status;
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

    public function add_country($request){

        $count = Country::where('country.name', $request->input('countryName'))
                    ->where('country.is_deleted', 'N')
                    ->count();
        if($count == 0){
            $objCountry = new Country();
            $objCountry->name = $request->input('countryName');
            $objCountry->is_active = $request->input('status');
            $objCountry->is_deleted = "N";
            $objCountry->created_at = date("Y-m-d H:i:s");
            $objCountry->updated_at = date("Y-m-d H:i:s");
            if($objCountry->save()){
                return "true";
            }
            return "false";
        }
        return 'country_exits';
    }

    public function get_country_details($editId){
        return Country::where('country.id', $editId)->select('country.id', 'country.is_active', 'country.name')->get()->toArray();
    }


    public function edit_country($request){
        $count = Country::where('country.name', $request->input('countryName'))
                        ->where('country.is_deleted', 'N')
                        ->where('country.id', '!=', $request->input('editId'))
                        ->count();

        if($count == 0){
            $objCountry = Country::find($request->input('editId'));
            $objCountry->name = $request->input('countryName');
            $objCountry->is_active = $request->input('status');
            $objCountry->updated_at = date("Y-m-d H:i:s");
            if($objCountry->save()){
                return "true";
            }else{
                return "false";
            }
        }
        return 'country_exits';
    }


    public function common_activity_user($data,$type){
        $objCountry = Country::find($data['id']);
        if($type == 0){
            $objCountry->is_deleted = "Y";
        }
        if($type == 1){
            $objCountry->is_active = "Y";
        }
        if($type == 2){
            $objCountry->is_active = "N";
        }

        $objCountry->updated_at = date("Y-m-d H:i:s");
        if($objCountry->save()){
            return true;
        }else{
            return false ;
        }
    }

    public function get_country_list(){
        return Country::where('country.is_deleted', 'N')->where('country.is_active', 'Y')->get()->toArray();
    }
}
