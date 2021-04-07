<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_attachments', function (Blueprint $table) {
            $table->unsignedInteger('meeting_id');
            $table->string('type')->nullable();
            $table->string('file_name')->nullable()->comment('Tên file');
            $table->string('file_path')->nullable()->comment('Tên đường dẫn file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_attachments');
    }
}
