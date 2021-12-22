<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //วิชาเรียน
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('course_name');
            $table->string('credit_course');
            $table->foreign('id_major')->references('id')->on('major')->onDelete('cascade');
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
        Schema::dropIfExists('course');
    }
}
