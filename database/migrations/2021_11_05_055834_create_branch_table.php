<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สาขาวิชา
        Schema::create('branch', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('branch_name');
            $table->string('branch_phone');
            $table->string('brannch_Code');
            $table->foreign('id_faculty')->references('id')->on('faculty')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch');
    }
}
