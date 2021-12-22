<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //กรรมการหลักสูตร
    public function up()
    {
        Schema::create('course_director', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('director_name');
            $table->foreign('id_syllabus')->references('id')->on('syllabus')->onDelete('cascade');
            $table->foreign('id_teacher')->references('id')->on('teacher')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_director');
    }
}
