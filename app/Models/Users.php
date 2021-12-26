<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hash;
use DB;
class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function edit_profile($request){
        $count =  Users::where('email', $request->input('email'))
                        ->where('id', '!=', $request->input('editId'))
                        ->where('is_deleted',  "N")
                        ->where('is_active',  "Y")
                        ->count();
        if($count == 0){
            $objUsers = Users::find($request->input('editId'));
            $objUsers->first_name = $request->input('first_name');
            $objUsers->last_name = $request->input('last_name');
            $objUsers->email  = $request->input('email');

            if($request->file('profile_image')){
                $image = $request->file('profile_image');
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/userprofile/');
                $image->move($destinationPath, $imagename);
                $objUsers->userimage  = $imagename ;
            }

            $objUsers->updated_at = date('Y-m-d h:i:s');
            if($objUsers->save()){
                return 'true';
            }else{
                return 'false';
            }
        }else{
            return "email_exist";
        }

    }

    public function change_password($request){

        // ccd($request->input());
        if (Hash::check($request->input('old_password'), $request->input('db_password'))) {

            $countUser = Users::where("id",'=',$request->input('editId'))->count();

            if($countUser == 1){
                $objUsers = Users::find($request->input('editId'));
                $objUsers->password =  Hash::make($request->input('new_password'));
                $objUsers->updated_at = date('Y-m-d h:i:s');
                if($objUsers->save()){
                    return 'true';
                }else{
                    return 'false';
                }
            }else{
                return 'false';
            }

        }else{
            return "password_not_match";
        }
    }

    public function check_id($table, $id){
        return DB::table($table)->where('id', $id)->count();
    }

    public function add_user($request, $adId){
       $count = Users::where('users.email', $request->input('email'))->count();
       if($count == 0){
            $objUsers = new Users();
            $objUsers->email = $request->input('email');
            $objUsers->password = Hash::make($request->input('password'));
            $objUsers->ad_id = $adId;
            $objUsers->coins = 1000;
            $objUsers->user_type = 'U';
            $objUsers->is_deleted = 'N';
            $objUsers->created_at = date('Y-m-d H:i:s');
            $objUsers->updated_at = date('Y-m-d H:i:s');
            if($objUsers->save()){
                return 'true';
            }else{
                return 'false';
            }
       }else{
           return 'email_exits';
       }
    }

    public function getdatatable(){
        $requestData = $_REQUEST;

        $columns = array(
            0 => 'users.id',
            1 => 'users.email',
            2 => 'users.ad_id',
            3 => 'adsense.first_name',
            4 => 'adsense.last_name',
        );

        $query = Quiztype ::from('users')
                    ->leftjoin('adsense', 'adsense.uniqe_id', '=', 'users.ad_id')
                    ->where('users.user_type', 'U')
                    ->where('users.is_deleted', 'N');


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
                        ->select('users.id', 'users.is_active', 'users.email', 'users.ad_id', 'adsense.first_name', 'adsense.last_name')
                        ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {

            $actionhtml = '';

            if($row['is_active'] == "Y"){
                $status = '<span class="badge badge-lg badge-success badge-inline">Active</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#deactiveModel" class="btn btn-icon  deactive-user" data-id="' . $row["id"] . '" title="Deactive Question"><i class="fa fa-times text-info" ></i></a>';
            }else{
                $status = '<span class="badge badge-lg badge-danger  badge-inline">Deactive</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#activeModel" class="btn btn-icon  active-user" data-id="' . $row["id"] . '" title="Active Question"><i class="fa fa-check text-info" ></i></a>';
            }

            $actionhtml =  $actionhtml.'<a href="javascript:;" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon delete-user" data-id="' . $row["id"] . '" title="Delete Question"><i class="fa fa-trash text-danger" ></i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['email'];
            $nestedData[] = $row['ad_id'];
            $nestedData[] = $row['first_name'] ==  NULL ? 'Admin' : $row['first_name']. " " . $row['last_name'] ;
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
        $objUsers = Users::find($data['id']);

        if($type == 0){
            $objUsers->is_deleted = "Y";
        }
        if($type == 1){
            $objUsers->is_active = "Y";
        }
        if($type == 2){
            $objUsers->is_active = "N";
        }

        $objUsers->updated_at = date("Y-m-d H:i:s");
        if($objUsers->save()){
            return true;
        }else{
            return false ;
        }
    }

    public function update_coins($coins, $userId){
        $objUsers = Users::find($userId);
        $objUsers->coins = $coins;
        $objUsers->updated_at = date('Y-m-d H:i:s');
        $objUsers->save();
    }

    public function get_users_coin($userid){
        return Users::where('id', $userid)->select('coins')->get()->toArray();
    }

    public function get_count_users(){
        return Users::from('users')->where('users.is_deleted', 'N')->where('users.is_active', 'Y')->where('users.user_type', 'U')->count();
    }
}
