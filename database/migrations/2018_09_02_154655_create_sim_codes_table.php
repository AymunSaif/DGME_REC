<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sim_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('country_code_id')->unsigned()->index()->nullable();
            $table->foreign('country_code_id')->references('id')->on('country_codes')->onDelete('cascade');      
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
        Schema::dropIfExists('sim_codes');
    }
}
