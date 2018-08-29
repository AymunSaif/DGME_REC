<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diary_num')->nullable();
            $table->string('name');
            $table->integer('cnic')->unique();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();    
            $table->timestamps();
        });


        Schema::create('applicant_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->unsigned()->index();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');

            $table->string('father_name')->nullable();
            $table->integer('province_id')->unsigned()->index()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
         
            $table->integer('district_id')->unsigned()->index()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
           
            $table->integer('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
           
            $table->string('postal_add')->nullable();
            $table->integer('phone_num')->nullable();
            $table->integer('cell_num')->nullable();
            
            $table->integer('applicant_appliedfor_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_appliedfor_id')->references('id')->on('applicant_appliedfor')->onDelete('no action');

            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
