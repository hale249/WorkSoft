<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('category_id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->date('deadline');
            $table->integer('created_by');
            $table->integer('job_ranting');
            $table->unsignedInteger('user_id')->comment('Người thực hiện');
            $table->integer('point_of_work')->default(0)->comment('Điểm người làm');
            $table->unsignedInteger('person_support')->nullable()->comment('Nguời hỗ trợ');
            $table->integer('point_of_work_sp')->default(0)->comment('Điểm người hỗ trợ');
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_attend')->default(0)->comment('Xác nhận gửi email');
            $table->boolean('is_embark')->default(0)->comment('Xác nhận tham gia hay không');
            $table->text('note')->nullable();
            $table->timestamp('reply_at');
            $table->boolean('is_finish')->default(0);
            $table->text('finish_mess')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_jobs');
    }
}
