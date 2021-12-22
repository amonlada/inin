<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('personel_name');
            $table->string('personel_room');
            $table->string('personel_position');
            $table->string('personel_phone');
            $table->string('personel_img');
            $table->foreign('id_agency')->references('id')->on('agency')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel');
    }
}
