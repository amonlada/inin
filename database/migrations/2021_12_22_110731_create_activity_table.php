<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('activity_name');
            $table->date('activity_date');
            $table->string('activity_details');
            $table->string('activity_responsible');
            $table->string('activity_year');
            $table->string('activity_number');
            $table->date('activity_apply');
            $table->string('activity_type');
            $table->string('activity_numberofcredits');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity');
    }
}
