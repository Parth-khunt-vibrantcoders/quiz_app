<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Resultpageimage extends Model
{
    use HasFactory;
    protected $table = 'result_image';

    public  function get_result_page_image_details()
    {
        return Resultpageimage::select('id', 'image')->first();
    }

    public function update_image($request){
        $objResultpageimage = Resultpageimage::find($request->input('editId'));
        if($request->file('image')){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/resultpages/');
            $image->move($destinationPath, $imagename);
            $objResultpageimage->image  = $imagename ;
        }

        $objResultpageimage->updated_at = date('Y-m-d h:i:s');
        return $objResultpageimage->save();
    }
}
