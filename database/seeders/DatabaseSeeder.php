<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "qzop@gmail.com",
            'password' => Hash::make('Qzop@123'),
            'userimage' => 'default.png',
            'user_type' => "A",
            'is_deleted' => "N",
            'is_active' => "Y",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
