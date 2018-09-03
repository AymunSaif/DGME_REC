<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantHigherEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_higher_education', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');           
            $table->string('qualification_type')->nullable();
            $table->string('bach_year')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('thesis_topic')->nullable();
            $table->integer('highersubject_id')->unsigned()->index()->nullable();
            $table->foreign('highersubject_id')->references('id')->on('highersubjects')->onDelete('cascade');            
            $table->double('cgpa',5,2)->nullable();
            $table->integer('total_marks')->nullable();
            $table->integer('achieved_marks')->nullable();
            $table->string('division')->nullable();
            $table->string('distinction')->nullable();
            $table->string('percentage')->nullable();
            $table->date('date_of_grad')->nullable();
            $table->date('final_dmc_date')->nullable();

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
        Schema::dropIfExists('applicant_higher_education');
    }
}
