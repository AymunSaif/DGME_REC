<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');           
            $table->string('org_name')->nullable();
            $table->string('org_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('role')->nullable();
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
        Schema::dropIfExists('applicant_experiences');
    }
}
