<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDeleteLandingPageQuestionsTable extends Migration
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
            $table->enum('is_deleted',['Y','N'])->default("N")->comment("Y for deleted, N for not deleted")->after('status');
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
