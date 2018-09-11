<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('applicant_secondary_education_logs', function (Blueprint $table) {
         $table->dropIndex(['secondarysubject_id']);
         $table->dropForeign(['secondarysubject_id']);
         $table->dropColumn('secondarysubject_id');
       });
       Schema::disableForeignKeyConstraints();
        Schema::table('applicant_higher_education_logs', function (Blueprint $table) {
         $table->dropIndex(['highersubject_id']);
         $table->dropForeign(['highersubject_id']);
         $table->dropColumn('highersubject_id');
       });
       Schema::enableForeignKeyConstraints();
       
       Schema::disableForeignKeyConstraints();
        Schema::table('applicant_higher_education_logs', function (Blueprint $table) {
         $table->dropIndex(['university_id']);
         $table->dropForeign(['university_id']);
         $table->dropColumn('university_id');
       });
       Schema::enableForeignKeyConstraints();
       Schema::table('applicant_secondary_education_logs', function (Blueprint $table) {
         $table->integer('secondary_subject_log_id')->unsigned()->index()->nullable();
         $table->foreign('secondary_subject_log_id')->references('id')->on('secondary_subject_logs')->onDelete('cascade');
   
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
