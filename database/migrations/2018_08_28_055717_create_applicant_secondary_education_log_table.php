<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantSecondaryEducationLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_secondary_education_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_log_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_log_id')->references('id')->on('applicant_logs')->onDelete('cascade');
             $table->string('name_of_school')->nullable();
            $table->string('qualification_type')->nullable();
            $table->string('board')->nullable();
            $table->integer('secondarysubject_id')->unsigned()->index()->nullable();
            $table->foreign('secondarysubject_id')->references('id')->on('secondarysubjects')->onDelete('cascade');
            $table->integer('total_marks')->nullable();
            $table->integer('achieved_marks')->nullable();
            $table->string('percentage')->nullable();
            $table->string('division')->nullable();
            $table->string('grades')->nullable();
            $table->string('distinction')->nullable();
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
        Schema::dropIfExists('applicant_secondary_education_logs');
    }
}
