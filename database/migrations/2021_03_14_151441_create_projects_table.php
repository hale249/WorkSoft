<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('category_id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->date('deadline');
            $table->integer('created_by');
            $table->unsignedInteger('user_id');
            $table->boolean('is_send_mail')->default(1)->change();
            $table->boolean('is_send_sms')->default(0)->change();
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
        Schema::dropIfExists('projects');
    }
}
