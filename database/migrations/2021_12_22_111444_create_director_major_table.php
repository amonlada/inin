<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorMajorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_major', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('director_major_name');

            $table->unsignedBigInteger('id_major');
            $table->foreign('id_major')->references('id')->on('major')->onDelete('cascade');

            $table->unsignedBigInteger('id_teacher');
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
        Schema::dropIfExists('director_major');
    }
}
