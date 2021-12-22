<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('manager_name');
            $table->string('manager_room');
            $table->string('manager_position');
            $table->string('manager_phone');
            $table->string('manager_email');
            $table->string('manager_img');
            $table->foreign('id_faculty')->references('id')->on('faculty')->onDelete('cascade');

        });
    }
    //ผู็บริหาร

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}
