<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('job_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('status_id')->default(0);
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
        Schema::dropIfExists('job_tasks');
    }
}
