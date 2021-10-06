<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Adsense extends Model
{
    use HasFactory;
    protected $table = 'adsense';

    public function getdatatable(){
        $requestData = $_REQUEST;

        $columns = array(
            0 => 'adsense.id',
            1 => 'adsense.image',
            2 => 'adsense.uniqe_id',
            3 => 'adsense.name',
            4 => 'adsense.phone_number',
            5 => 'adsense.pan_number',
            6 => 'adsense.doj',
            7 => 'adsense.is_active',
        );

        $query = Landingpagequestion ::from('adsense')->where('adsense.is_deleted', 'N');


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
                        ->select('adsense.id', 'adsense.image', 'adsense.uniqe_id','adsense.name', 'adsense.phone_number',
                        'adsense.pan_number', 'adsense.doj', 'adsense.is_active')
                        ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {

            if(file_exists( public_path().'/uploads/adsense/'.$row['image']) && $row['image'] != ''){
                $image = url("public/uploads/adsense/".$row['image']);
            }else{
                $image = url("public/uploads/adsense/default.jpg");
            }
            $userimage = '<img src="'.$image.'" class="rounded-circle" alt="'.$row['full_name'].'" style="width:70px;height:70px">';
            $actionhtml = '<a href="' . route('users-management-edit', $row['id']) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><i class="fa fa-edit text-warning"> </i></a>';

            if($row['is_active'] == "Y"){
                $status = '<span class="badge badge-lg badge-success badge-inline">Yes</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deactiveModel" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 deactiveadsenseusers" data-id="' . $row["id"] . '" ><i class="fa fa-times text-primary" ></i></a>';
            }else{
                $status = '<span class="badge badge-lg badge-danger  badge-inline">No</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#activeModel" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 activeadsenseusers" data-id="' . $row["id"] . '" ><i class="fa fa-check text-primary" ></i></a>';
            }

            $actionhtml =  $actionhtml.'<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteModel" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 deleteadsenseusers" data-id="' . $row["id"] . '" ><i class="fa fa-trash text-danger" ></i></a>';

            $i++;

            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $userimage;
            $nestedData[] = $row['uniqe_id'];
            $nestedData[] = $row['name'];
            $nestedData[] = $row['phone_number'];
            $nestedData[] = $row['pan_number'];
            $nestedData[] = date_formate($row['doj']);
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

    public function check_id($uniqe_id){
        $count = Adsense::where('uniqe_id', $uniqe_id)->count();
        if($count == 0){
            return $uniqe_id;
        }else{
            return $this->create_token();
        }
    }

    public function create_token(){
        return uniqid();
    }

    public function add_adsense($request){

        $objAdsense = new Adsense();
        if($request->file('profile_image')){
            $image = $request->file('profile_image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/adsense/');
            $image->move($destinationPath, $imagename);
            $objAdsense->image  = $imagename ;
        }
        $objAdsense->uniqe_id = $this->check_id($this->create_token());
        $objAdsense->name = $request->input('name');
        $objAdsense->phone_number = $request->input('mo_no');
        $objAdsense->pan_number = $request->input('pan_no');
        $objAdsense->doj = date("Y-m-d",strtotime($request->input('doj')));
        $objAdsense->script = $request->input('adseanse_script');
        $objAdsense->note = $request->input('note');
        $objAdsense->is_active = "Y";
        $objAdsense->is_deleted = "N";
        $objAdsense->created_at =date('Y-m-d h:i:s');
        $objAdsense->updated_at =date('Y-m-d h:i:s');
        return $objAdsense->save();
    }

    public function get_adsense_details($id){
        return Adsense::where('id', $id)
                    ->select('adsense.id', 'adsense.image', 'adsense.uniqe_id','adsense.name', 'adsense.phone_number',
                            'adsense.pan_number', 'adsense.doj',  'adsense.script', 'adsense.note', )
                    ->get()
                    ->toArray();
    }

    public function edit_adsense($request){
        $objAdsense = Adsense::find($request->input('editid'));
        if($request->file('profile_image')){
            $image = $request->file('profile_image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/adsense/');
            $image->move($destinationPath, $imagename);
            $objAdsense->image  = $imagename ;
        }
        $objAdsense->name = $request->input('name');
        $objAdsense->phone_number = $request->input('mo_no');
        $objAdsense->pan_number = $request->input('pan_no');
        $objAdsense->doj = date("Y-m-d",strtotime($request->input('doj')));
        $objAdsense->script = $request->input('adseanse_script');
        $objAdsense->note = $request->input('note');
        $objAdsense->updated_at =date('Y-m-d h:i:s');
        return $objAdsense->save();
    }

    public function common_activity_user($data,$type){
        $objAdsense = Adsense::find($data['id']);

        if($type == 0){
            $objAdsense->is_deleted = "Y";
        }
        if($type == 1){
            $objAdsense->is_active = "Y";
        }
        if($type == 2){
            $objAdsense->is_active = "N";
        }

        $objAdsense->updated_at = date("Y-m-d H:i:s");
        if($objAdsense->save()){
            return true;
        }else{
            return false ;
        }
    }
}
