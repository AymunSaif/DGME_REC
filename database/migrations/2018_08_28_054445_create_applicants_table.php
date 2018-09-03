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
            $table->string('name')->nullable();
            $table->string('cnic')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->integer('status')->default(1);
            $table->integer('created_by')->unsigned()->index();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('no action');   
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
            $table->string('cell_num')->nullable();
            $table->string('phone_num')->nullable();
            
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
