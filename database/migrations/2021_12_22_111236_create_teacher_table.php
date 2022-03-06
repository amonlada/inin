<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('teacher_name');
            $table->string('teacher_room');
            $table->string('teacher_phone');
            $table->string('teacher_email');
            $table->string('teacher_image'); //url

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
        Schema::dropIfExists('teacher');
    }
}
