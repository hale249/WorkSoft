<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_users', function (Blueprint $table) {
            $table->unsignedInteger('meeting_id');
            $table->unsignedInteger('user_id');
            $table->boolean('is_attend')->default(0)->comment('Xác nhận gửi email');
            $table->boolean('is_embark')->default(0)->comment('Xác nhận tham gia hay không');
            $table->text('note')->nullable();
            $table->timestamp('reply_at')->nullable();
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
        Schema::dropIfExists('meeting_users');
    }
}
