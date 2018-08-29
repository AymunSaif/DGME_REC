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
            $table->string('name_of_institute')->nullable();
            $table->string('qualification_type')->nullable();
            $table->string('bach_year')->nullable();
            $table->string('degree')->nullable();
            $table->integer('highersubject_id')->unsigned()->index()->nullable();
            $table->foreign('highersubject_id')->references('id')->on('highersubjects')->onDelete('cascade');            
            $table->double('total_marks',5,2)->nullable();
            $table->double('achieved_marks',5,2)->nullable();
            $table->string('division')->nullable();
            $table->string('distinction')->nullable();
          
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
