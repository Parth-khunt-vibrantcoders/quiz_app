<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms')->insert([
            'identifier' => "privacy",
            'text' => "Testing Privacy",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

        DB::table('cms')->insert([
            'identifier' => "rules",
            'text' => "Testing Rules",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

    }
}
