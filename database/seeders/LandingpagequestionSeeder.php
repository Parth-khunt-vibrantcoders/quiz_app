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
        DB::table('landing_page_question')->truncate();
        DB::table('landing_page_question')->insert([
            'question' => "Which one of the following river flows between Vindhyan and Satpura ranges ?",
            'answer1' => "Narmada",
            'answer2' => "Mahanadi",
            'answer3' => "Son",
            'answer4' => "Netravati",
            'right_answer' => "1",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

        DB::table('landing_page_question')->insert([
            'question' => "Patanjali is well known for the compilation of –",
            'answer1' => "Ayurveda",
            'answer2' => "Panchatantra",
            'answer3' => "Brahma Sutra",
            'answer4' => "Yoga Sutra",
            'right_answer' => "4",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        DB::table('landing_page_question')->insert([
            'question' => "Which one of the following rivers originates in Brahmagiri range of Western Ghats?",
            'answer1' => "Pennar",
            'answer2' => "Cauvery",
            'answer3' => "Krishna",
            'answer4' => "Tapti",
            'right_answer' => "2",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

        DB::table('landing_page_question')->insert([
            'question' => "The country that has the highest in Barley Production?",
            'answer1' => "China",
            'answer2' => "India",
            'answer3' => "Russia",
            'answer4' => "France",
            'right_answer' => "3",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
