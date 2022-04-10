<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Quizcategory;
use App\Models\Quiz;
class Quiztype extends Model
{
    use HasFactory;
    protected $table = 'quiz_type';

    public function getdatatable(){
        $requestData = $_REQUEST;

        $columns = array(
            0 => 'quiz_type.id',
            1 => 'quiz_type.name',
            2 => 'country.name',
            3 => 'quiz_type.priority',
            2 => 'quiz_type.status',
        );

        $query = Quiztype ::from('quiz_type')
                    ->join('country', 'country.id', '=', 'quiz_type.country')
                    ->where('quiz_type.is_deleted', 'N');


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
                        ->select('quiz_type.id', 'quiz_type.name', 'quiz_type.priority', 'quiz_type.status', 'country.name as countryName')
                        ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {

            $actionhtml = '<a href="' . route('quiz-type-edit', $row['id']) . '" class="btn btn-icon" title="Edit Details"><i class="fa fa-edit text-warning"> </i></a>';

            if($row['status'] == "Y"){
                $status = '<span class="badge badge-lg badge-success badge-inline">Active</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#deactiveModel" class="btn btn-icon  deactive-quiz-type" data-id="' . $row["id"] . '" title="Deactive Question"><i class="fa fa-times text-info" ></i></a>';
            }else{
                $status = '<span class="badge badge-lg badge-danger  badge-inline">Deactive</span>';
                $actionhtml =  $actionhtml. '<a href="javascript:;" data-toggle="modal" data-target="#activeModel" class="btn btn-icon  active-quiz-type" data-id="' . $row["id"] . '" title="Active Question"><i class="fa fa-check text-info" ></i></a>';
            }

            $actionhtml =  $actionhtml.'<a href="javascript:;" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon delete-quiz-type" data-id="' . $row["id"] . '" title="Delete Question"><i class="fa fa-trash text-danger" ></i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['name']);
            $nestedData[] = ucfirst($row['countryName']);
            $nestedData[] = ucfirst($row['priority']);
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

    public function get_quiz_type_list(){
        return Quiztype::select('quiz_type.name', 'quiz_type.id',)
                        ->where('quiz_type.status', 'Y')
                        ->where('quiz_type.is_deleted', 'N')
                        ->get()
                        ->toArray();
    }
    public function get_quiz_type_frontend_list($country){
        if($country == 'United States'){
            $country = 'usa';
        }else{
            $country = 'other';
        }
        $result = Quiztype::select('quiz_type.name', 'quiz_type.id',)
                        ->where('quiz_type.status', 'Y')
                        ->where('quiz_type.is_deleted', 'N')
                        ->where('quiz_type.country', $country)
                        ->orderBy('quiz_type.priority', 'ASC')
                        ->orderBy('quiz_type.created_at', 'ASC')
                        ->get()
                        ->toArray();

        foreach($result as $key => $value){
            $res = Quiz::from('quiz')
                        ->join('question', 'question.quiz_id', '=', 'quiz.id')
                        ->join('quiz_category', 'quiz_category.id', '=', 'quiz.category')
                        ->join('quiz_type', 'quiz_type.id', '=', 'quiz_category.quiz_type')
                        ->where('quiz_type.status', 'Y')
                        ->where('quiz_type.is_deleted', 'N')
                        ->where('quiz_category.status', 'Y')
                        ->where('quiz_category.is_deleted', 'N')
                        ->where('quiz.status', 'Y')
                        ->where('quiz.is_deleted', 'N')
                        ->where('quiz_type.id', $value['id'])
                        ->groupBy('question.quiz_id')
                        ->inRandomOrder()
                        ->select('quiz.slug', 'quiz.image', 'quiz.name as quiz_app', 'quiz.fee', 'quiz.prize', 'quiz.time', 'quiz_category.name')
                        ->get()
                        ->toArray();
            $result[$key]['quiz'] = $res;
        }

        return $result;
    }

    public function add_quiz_type($request){
        $count = Quiztype::where('quiz_type.name', $request->input('quiz_type'))
                    ->where('quiz_type.country', $request->input('country'))
                    ->count();
        if($count == 0){
            $objQuiztype = new Quiztype();
            $objQuiztype->name = $request->input('quiz_type');
            $objQuiztype->status = $request->input('status');
            $objQuiztype->priority = $request->input('quiz_priority');
            $objQuiztype->country = $request->input('country');
            $objQuiztype->is_deleted = "N";
            $objQuiztype->created_at = date("Y-m-d H:i:s");
            $objQuiztype->updated_at = date("Y-m-d H:i:s");
            if($objQuiztype->save()){
                return "true";
            }
            return "false";
        }
        return 'quiz_type_exits';
    }

    public function get_quiz_type_details($id){
        return Quiztype::select('quiz_type.name', 'quiz_type.country',  'quiz_type.priority', 'quiz_type.id', 'quiz_type.status')->where('quiz_type.id', $id)->get()->toArray();
    }

    public function edit_quiz_type($request){
        $count = Quiztype::where('quiz_type.name', $request->input('quiz_type'))
                        ->where('quiz_type.country', $request->input('country'))
                        ->where('quiz_type.id', '!=', $request->input('editId'))
                        ->count();

        if($count == 0){
            $objQuiztype = Quiztype::find($request->input('editId'));
            $objQuiztype->name = $request->input('quiz_type');
            $objQuiztype->country = $request->input('country');
            $objQuiztype->priority = $request->input('quiz_priority');
            $objQuiztype->status = $request->input('status');
            $objQuiztype->updated_at = date("Y-m-d H:i:s");
        if($objQuiztype->save()){
            return "true";
        }
            return "false";
        }
        return 'quiz_type_exits';

    }


    public function common_activity_user($data,$type){
        $objQuiztype = Quiztype::find($data['id']);
        if($type == 0){
            $objQuiztype->is_deleted = "Y";
        }
        if($type == 1){
            $objQuiztype->status = "Y";
        }
        if($type == 2){
            $objQuiztype->status = "N";
        }

        $objQuiztype->updated_at = date("Y-m-d H:i:s");
        if($objQuiztype->save()){
            return true;
        }else{
            return false ;
        }
    }
}
