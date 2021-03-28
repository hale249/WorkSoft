<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings_users', function (Blueprint $table) {
            $table->unsignedInteger('meetings');
            $table->unsignedInteger('users');
            $table->boolean('open_mail')->default(0)->change();
            $table->boolean('is_reply')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings_users');
    }
}
