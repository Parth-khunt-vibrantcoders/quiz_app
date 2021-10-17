<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';

    public function getdatatable(){
        $requestData = $_REQUEST;

        $columns = array(
            0 => 'quiz.id',
            1 => 'quiz_type.name',
            2 => 'quiz_category.name',
            3 => 'quiz.name',
            4 => 'quiz.fee',
            5 => 'quiz.prize',
            6 => 'quiz.time',
        );

        $query = Quiztype ::from('quiz')
                    ->join('quiz_category', 'quiz_category.id', '=', 'quiz.category')
                    ->join('quiz_type', 'quiz_type.id', '=', 'quiz_category.quiz_type')
                    ->where('quiz.is_deleted', 'N');


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
                        ->select('quiz.id', 'quiz_type.name as quiz_type', 'quiz_category.name as quiz_category', 'quiz.name', 'quiz.fee', 'quiz.prize', 'quiz.time')
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
            $nestedData[] = ucfirst($row['quiz_type']);
            $nestedData[] = ucfirst($row['quiz_category']);
            $nestedData[] = ucfirst($row['name']);
            $nestedData[] = $row['fee'];
            $nestedData[] = $row['prize'];
            $nestedData[] = date("h:i: A", strtotime($row['name']));
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
}
