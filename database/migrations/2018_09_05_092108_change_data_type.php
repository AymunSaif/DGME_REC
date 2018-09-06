<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('applicant_details', function (Blueprint $table) {
            $table->dropIndex(['city_id']);
         $table->dropForeign(['city_id']);
         $table->dropColumn('city_id');

       });
       Schema::enableForeignKeyConstraints();
        Schema::table('applicant_details', function (Blueprint $table) {
            $table->string('city')->nullable();
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
