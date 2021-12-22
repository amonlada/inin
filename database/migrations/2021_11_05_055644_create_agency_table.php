<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //หน่วยงาน
    public function up()
    {
        Schema::create('agency', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('agecy_name');
            $table->string('agency_address');
            $table->string('agency_phone');
            $table->foreign('id_faculty')->references('id')->on('faculty')->onDelete('cascade');
            $table->foreign('id_manager')->references('id')->on('manager')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency');
    }
}
