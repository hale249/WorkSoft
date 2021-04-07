<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedInteger('user_id')->comment('Người thực hiện');
            $table->integer('point_of_work')->default(0)->comment('Điểm người làm');
            $table->unsignedInteger('person_support')->nullable()->comment('Nguời hỗ trợ');
            $table->integer('point_of_work_sp')->default(0)->comment('Điểm người hỗ trợ');
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_attend')->default(0)->comment('Xác nhận gửi email');
            $table->boolean('is_embark')->default(0)->comment('Xác nhận tham gia hay không');
            $table->text('note')->nullable();
            $table->timestamp('reply_at');
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
        Schema::dropIfExists('job_users');
    }
}
