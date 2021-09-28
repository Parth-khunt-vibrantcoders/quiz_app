<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class LandingpageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landing_page_image')->insert([
            'image' => "man-getting.jpg",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
