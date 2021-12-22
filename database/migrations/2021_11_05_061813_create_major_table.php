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
    //วิชาเอก
    public function up()
    {
        Schema::create('major', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('major_name');
            $table->string('credit');

            $table->foreign('id_syllabus')->references('id')->on('syllabus')->onDelete('cascade');

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
