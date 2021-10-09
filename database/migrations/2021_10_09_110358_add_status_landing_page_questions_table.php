<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusLandingPageQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_question', function (Blueprint $table) {
            //
            $table->enum('status',['Y','N'])->default("Y")->comment("Y for active, N for not active")->after('right_answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page_question', function (Blueprint $table) {
            //
        });
    }
}
