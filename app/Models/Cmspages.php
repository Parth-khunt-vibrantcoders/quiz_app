<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmspages extends Model
{
    use HasFactory;
    protected $table = 'cms';

    public function get_cms_details($identifier){
        return Cmspages::where('cms.identifier', $identifier)->select('cms.text', 'cms.id')->get()->toArray();
    }

    public function save_cms_page_details($request){
        $objCmspages = Cmspages::find($request->input('editId'));
        $objCmspages->text = $request->input('content');
        $objCmspages->updated_at = date('Y-m-d H:i:s');
        return $objCmspages->save();;
    }
}
