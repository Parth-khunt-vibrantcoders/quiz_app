<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class LandingpagequestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landing_page_question')->insert([
            'question' => "Select your Age Rang ?",
            'answer1' => "10 - 15",
            'answer2' => "15 - 20",
            'answer3' => "20 - 25",
            'answer4' => "25 to Up",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

        DB::table('landing_page_question')->insert([
            'question' => "Who is the Father of our Nation?",
            'answer1' => "Jawaharlal Nehru",
            'answer2' => "Mahatma Gandhi",
            'answer3' => "Sardar Vallabhbhai Patel",
            'answer4' => "Subhash Chandra Bose",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
