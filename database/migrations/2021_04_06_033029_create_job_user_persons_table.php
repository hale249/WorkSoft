<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobUserPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_user_persons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('job_user_id');
            $table->unsignedInteger('user_id')->comment('Người phụ trách công việc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_user_persons');
    }
}
