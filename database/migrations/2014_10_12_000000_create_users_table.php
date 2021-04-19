<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staff_code', 40)->comment('Mã cán bộ');
            $table->string('name', 100);
            $table->string('email',  30)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status')->default(1);
            $table->text('avatar')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('password');
            $table->integer('role')->default('0');
            $table->string('position')->nullable()->comment('Chức vụ');
            $table->string('degree')->nullable()->comment('Cấp đô');
            $table->boolean('sex')->default('1')->comment('1- nam, 0-nữ');
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
