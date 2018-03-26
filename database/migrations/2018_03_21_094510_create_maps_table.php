<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placename', 12)->default('领地'); # 地名
            $table->unsignedInteger('xAxis'); # X 轴坐标
            $table->unsignedInteger('yAxis'); # Y 轴坐标
            $table->unsignedInteger('userId')->default(0);
            $table->string('terrain', 32); # 地形
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
        Schema::dropIfExists('maps');
    }
}
