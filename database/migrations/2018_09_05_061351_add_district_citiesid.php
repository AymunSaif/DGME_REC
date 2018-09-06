<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistrictCitiesid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->integer('province_id')->unsigned()->index()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('no action');
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->integer('district_id')->unsigned()->index()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
