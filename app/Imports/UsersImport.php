<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function  __construct($report_id)
    {

        $this->report_id= $report_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $quiz_id = $this->report_id;
        $objQuestion = new Question();
        $objQuestion->quiz_id = $quiz_id;
        $objQuestion->question = $row[0];
        $objQuestion->answer1 = $row[1];
        $objQuestion->answer2 = $row[2];
        $objQuestion->answer3 = $row[3];
        $objQuestion->answer4 = $row[4];
        $objQuestion->right_answer = $row[5];
        $objQuestion->is_active = "Y";
        $objQuestion->is_deleted = 'N';
        $objQuestion->created_at = date("Y-m-d H:i:s");
        $objQuestion->updated_at = date("Y-m-d H:i:s");
        $objQuestion->save();
    }
}
