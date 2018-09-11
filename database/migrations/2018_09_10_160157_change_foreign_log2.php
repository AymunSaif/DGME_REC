<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignLog2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_higher_education_logs', function (Blueprint $table) {
            $table->integer('higher_subject_log_id')->unsigned()->index()->nullable();
            $table->foreign('higher_subject_log_id')->references('id')->on('higher_subject_logs')->onDelete('cascade');
      
            $table->integer('university_log_id')->unsigned()->index()->nullable();
            $table->foreign('university_log_id')->references('id')->on('university_logs')->onDelete('cascade');
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
