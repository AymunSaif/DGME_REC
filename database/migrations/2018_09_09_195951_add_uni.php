<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUni extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_higher_education', function (Blueprint $table) {
            $table->dropColumn('institute_name')->nullable();
    });

    Schema::table('applicant_higher_education', function (Blueprint $table) {
        $table->integer('university_id')->unsigned()->index()->nullable();
        $table->foreign('university_id')->references('id')->on('universities')->onDelete('no action');
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
