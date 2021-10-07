<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdsenseNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adsense', function (Blueprint $table) {
            //
            $table->string('first_name')->after('uniqe_id');
            $table->string('last_name')->after('first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adsense', function (Blueprint $table) {
            //
        });
    }
}
