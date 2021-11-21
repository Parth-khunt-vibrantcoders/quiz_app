<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class StartquizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('start_quiz_image')->insert([
            'image' => "treasure.svg",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
