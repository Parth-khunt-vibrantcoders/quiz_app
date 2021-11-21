<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Startquizimage extends Model
{
    use HasFactory;
    protected $table = 'start_quiz_image';

    public function get_start_quiz_image_details(){
        return Startquizimage::select('id', 'image')->first();
    }

    public function update_image($request){
        $objStartquizimage = Startquizimage::find($request->input('editId'));
        if($request->file('image')){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/startquiz/');
            $image->move($destinationPath, $imagename);
            $objStartquizimage->image  = $imagename ;
        }

        $objStartquizimage->updated_at = date('Y-m-d h:i:s');
        return $objStartquizimage->save();
    }
}
