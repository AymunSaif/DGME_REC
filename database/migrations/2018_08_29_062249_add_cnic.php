<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCnic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function(Blueprint $table){
            $table->dropUnique(['cnic'])->nullable();
            $table->dropColumn('cnic')->unique()->nullable();
           });
          Schema::table('applicants', function(Blueprint $table){
            $table->string('cnic')->unique()->nullable();
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
