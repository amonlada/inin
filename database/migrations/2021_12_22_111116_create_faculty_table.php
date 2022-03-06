<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('faculty_name');
            $table->string('faculty_address');
            $table->string('faculty_phone');
            $table->string('faculty_executive');
            $table->string('faculty_position');
            $table->string('faculty_year');
            $table->string('faculty_email');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty');
    }
}
