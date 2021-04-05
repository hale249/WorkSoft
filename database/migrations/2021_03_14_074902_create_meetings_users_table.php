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
            $table->unsignedInteger('meeting_id');
            $table->unsignedInteger('user_id');
            $table->boolean('is_join')->default(0);
            $table->timestamp('reply_at')->nullable();
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
