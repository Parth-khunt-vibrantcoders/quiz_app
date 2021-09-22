<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hash;

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
}
