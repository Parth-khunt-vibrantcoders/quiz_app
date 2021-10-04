<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Landingpageimage extends Model
{
    use HasFactory;
    protected $table = 'landing_page_image';

    public function get_landing_page_image_details(){
        return Landingpageimage::select('id', 'image')->first();
    }

    public function update_image($request){

        $objLandingpageimage = Landingpageimage::find($request->input('editId'));

        if($request->file('image')){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/landingpages/');
            $image->move($destinationPath, $imagename);
            $objLandingpageimage->image  = $imagename ;
        }

        $objLandingpageimage->updated_at = date('Y-m-d h:i:s');
        return $objLandingpageimage->save();
    }
}
