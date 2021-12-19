<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Landingpagequestion extends Model
{
    use HasFactory;
    protected $table = 'landing_page_question';

    public function getdatatable(){
        $requestData = $_REQUEST;

        $columns = array(
            0 => 'landing_page_question.id',
            1 => 'landing_page_question.question',
            1 => 'landing_page_question.status',
        );

        $query = Landingpagequestion ::from('landing_page_question')
                                ->where('landing_page_question.is_deleted', 'N');


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
                        ->select('landing_page_question.id', 'landing_page_question.question', 'landing_page_question.status')
                        ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {

            $actionhtml = '<a href="' . route('landing-page-question-edit', $row['id']) . '" class="btn btn-icon" title="Edit Details"><i class="fa fa-edit text-warning"> </i></a>';

            if($row['status'] == "Y"){
                $status = '<span class="badge badge-lg badge-success badge-inline">Active</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#deactiveModel" class="btn btn-icon  deactivedeletequestion" data-id="' . $row["id"] . '" title="Deactive Question"><i class="fa fa-times text-info" ></i></a>';
            }else{
                $status = '<span class="badge badge-lg badge-danger  badge-inline">Deactive</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#activeModel" class="btn btn-icon  activedeletequestion" data-id="' . $row["id"] . '" title="Active Question"><i class="fa fa-check text-info" ></i></a>';
            }

            $actionhtml =  $actionhtml.'<a href="javascript:;" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon deletequestion" data-id="' . $row["id"] . '" title="Delete Question"><i class="fa fa-trash text-danger" ></i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['question'];
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

    public function add_quetion($request){

        $objLandingpagequestion = new Landingpagequestion();
        $objLandingpagequestion->question = $request->input('question');
        $objLandingpagequestion->answer1 = $request->input('answer1');
        $objLandingpagequestion->answer2 = $request->input('answer2');
        $objLandingpagequestion->answer3 = $request->input('answer3');
        $objLandingpagequestion->answer4 = $request->input('answer4');
        $objLandingpagequestion->status = $request->input('status');
        $objLandingpagequestion->created_at = date('Y-m-d h:i:s');
        $objLandingpagequestion->updated_at = date('Y-m-d h:i:s');
        return $objLandingpagequestion->save();
    }
    public function edit_question($request){
        // ccd($request->input());
        $objLandingpagequestion = Landingpagequestion::find($request->input('editId'));
        $objLandingpagequestion->question = $request->input('question');
        $objLandingpagequestion->answer1 = $request->input('answer1');
        $objLandingpagequestion->answer2 = $request->input('answer2');
        $objLandingpagequestion->answer3 = $request->input('answer3');
        $objLandingpagequestion->answer4 = $request->input('answer4');
        $objLandingpagequestion->status = $request->input('status');
        $objLandingpagequestion->created_at = date('Y-m-d h:i:s');
        return $objLandingpagequestion->save();
    }

    public function get_question_details($id){
        return Landingpagequestion::where('landing_page_question.id', $id)
                ->select('landing_page_question.question', 'landing_page_question.answer1', 'landing_page_question.answer2', 'landing_page_question.answer3', 'landing_page_question.answer4',  'landing_page_question.id', 'landing_page_question.status' )
                ->get()
                ->toArray();
    }

    public function common_activity_user($data,$type){
        $objLandingpagequestion = Landingpagequestion::find($data['id']);

        if($type == 0){
            $objLandingpagequestion->is_deleted = "Y";
        }
        if($type == 1){
            $objLandingpagequestion->status = "Y";
        }
        if($type == 2){
            $objLandingpagequestion->status = "N";
        }

        $objLandingpagequestion->updated_at = date("Y-m-d H:i:s");
        if($objLandingpagequestion->save()){
            return true;
        }else{
            return false ;
        }
    }

    public function get_landing_page_question(){
        return Landingpagequestion::select('question', 'answer1', 'answer2', 'answer3', 'answer4')
                ->where('landing_page_question.status', 'Y')
                ->where('landing_page_question.is_deleted', 'N')
                ->inRandomOrder()
                ->limit(2)
                ->get()
                ->toArray();
    }
}
