<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPointToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('job_ranting');
            $table->integer('point_of_work')->default('0');
            $table->unsignedInteger('person_support')->nullable();
            $table->unsignedInteger('person_mission')->nullable();
            $table->integer('point_of_work_sp')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('job_ranting');
            $table->integer('point_of_work');
            $table->unsignedInteger('person_support');
            $table->unsignedInteger('person_mission');
            $table->integer('point_of_work_sp');
        });
    }
}
