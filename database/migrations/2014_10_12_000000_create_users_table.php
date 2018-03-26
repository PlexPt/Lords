<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('nickname'); # 昵称
            $table->string('email')->unique(); # 邮箱
            $table->string('phone')->nullable(); # 手机号
            $table->string('password'); # 密码
            $table->unsignedTinyInteger('gender')->nullable(); # 性别
            $table->unsignedMediumInteger('countryId')->default(0); # 国家
            $table->unsignedMediumInteger('religionId')->default(0); # 宗教
//            $table->(''); # 注释
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
