<?php

namespace Database\Seeders;

use App\Models\Landingpagequestion;
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
        $this->call(Adminuerseeder::class);
        $this->call(CmsSeeder::class);
        $this->call(LandingpagequestionSeeder::class);
        $this->call(LandingpageSeeder::class);
        $this->call(ResultImageSeeder::class);
        $this->call(StartquizSeeder::class);
    }
}
