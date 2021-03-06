<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_certifications', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('applicant_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->string('name_certifictaion')->nullable(); 
            $table->string('issued_by')->nullable();
            $table->string('date_of_issuance')->nullable();
            $table->boolean('status')->default();
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
        Schema::dropIfExists('applicant_certifications');
    }
}
