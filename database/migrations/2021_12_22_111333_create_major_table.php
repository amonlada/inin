<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('major_name');
            $table->string('major_numberofcredits');
            $table->string('major_money');
            $table->string('major_mainsubject');

            $table->unsignedBigInteger('id_branch');
            $table->foreign('id_branch')->references('id')->on('branch')->onDelete('cascade');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('major');
    }
}
