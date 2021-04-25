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
            $table->string('subject_name')->nullable();
            $table->string('group')->nullable();
            $table->string('credit')->nullable();
            $table->string('class_code')->nullable();
            $table->string('credit_tuit')->nullable();
            $table->string('semester')->nullable();
            $table->string('link')->nullable();
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
