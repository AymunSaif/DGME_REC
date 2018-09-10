<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchWorkLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_research_work_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_log_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_log_id')->references('id')->on('applicant_logs')->onDelete('cascade');
            $table->string('researchtype')->nullable();
            $table->string('name')->nullable();
            $table->string('published_year')->nullable();
            $table->string('conference')->nullable();
            $table->date('date_published')->nullable();
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
        Schema::dropIfExists('applicant_research_work_logs');
    }
}
