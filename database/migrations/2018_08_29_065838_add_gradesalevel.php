<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGradesalevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_higher_education', function(Blueprint $table){
            $table->dropColumn('alevel_grades')->nullable();
           });
          Schema::table('applicant_secondary_education', function(Blueprint $table){
            $table->string('alevel_grades')->nullable();
           });//
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