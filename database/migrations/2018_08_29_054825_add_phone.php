<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_details', function(Blueprint $table){
            $table->dropColumn('cell_num');
            $table->dropColumn('phone_num');
          });
          Schema::table('applicant_details', function(Blueprint $table){
            $table->string('cell_num')->nullable();
            $table->string('phone_num')->nullable();
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
