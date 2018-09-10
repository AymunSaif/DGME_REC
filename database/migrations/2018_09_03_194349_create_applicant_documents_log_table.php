<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantDocumentsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_document_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_log_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_log_id')->references('id')->on('applicant_logs')->onDelete('cascade');
            $table->string('cnic_pic')->nullable();
            $table->string('applicant_picture')->nullable();
            $table->string('cv')->nullable();
            $table->string('other_documents')->nullable();

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
        Schema::dropIfExists('applicant_document_logs');
    }
}
