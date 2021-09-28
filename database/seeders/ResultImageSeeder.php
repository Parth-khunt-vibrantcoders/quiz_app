<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ResultImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('result_image')->insert([
            'image' => "result.gif",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
