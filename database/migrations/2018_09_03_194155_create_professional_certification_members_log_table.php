<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalCertificationMembersLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_certification_member_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_log_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_log_id')->references('id')->on('applicant_logs')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('membership_level')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('registeration')->nullable();
            $table->date('issuance_date')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('professional_certification_member_logs');
    }
}
