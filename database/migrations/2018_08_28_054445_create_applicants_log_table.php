<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->unsigned()->index();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->string('diary_num')->nullable();
            $table->string('uniqueNumber')->nullable();
            $table->string('name')->nullable();
            $table->string('cnic')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('religion')->nullable();
            $table->integer('status')->default(1);
            $table->integer('created_by')->unsigned()->index();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('no action');
            $table->timestamps();
        });


        Schema::create('applicant_detail_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_log_id')->unsigned()->index();
            $table->foreign('applicant_log_id')->references('id')->on('applicant_logs')->onDelete('cascade');

            $table->string('father_name')->nullable();
            $table->integer('province_id')->unsigned()->index()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');

            $table->integer('district_id')->unsigned()->index()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

            $table->string('city')->nullable();

            $table->string('postal_add')->nullable();
            $table->string('cell_num')->nullable();
            $table->string('cellnum_2')->nullable();
            $table->string('phone_num')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_logs');
    }
}
