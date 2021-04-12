<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeatablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeatables', function (Blueprint $table) {
            $table->id();
            $table->string('staff_code');
            $table->string('sub_code');
            $table->string('subject_name');
            $table->string('group');
            $table->string('credit');
            $table->string('class_code');
            $table->string('credit_tuit');
            $table->string('semester');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeatables');
    }
}
