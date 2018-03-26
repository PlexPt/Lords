<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mapId')->unique(); # 领地Id
            $table->unsignedInteger('userId'); #  领主Id
            # 住宅
            $table->unsignedInteger('houseOne')->default(5); # 一级
            $table->unsignedInteger('houseTwo')->default(0); # 二级
            $table->unsignedInteger('houseThree')->default(0); # 三级
            # 伐木场
            $table->unsignedInteger('loggingOne')->default(0); # 一级
            $table->unsignedInteger('loggingTwo')->default(0); # 二级
            # 农场
            $table->unsignedInteger('farmOne')->default(1); # 一级
            $table->unsignedInteger('farmTwo')->default(0); # 二级
            $table->unsignedInteger('farmThree')->default(0); # 三级
            # 采石场
//            $table->unsignedInteger('quarryOne')->default(0); # 一级
//            $table->unsignedInteger('quarryTwo')->default(0); # 二级
            # 菜市场
            $table->unsignedInteger('marketOne')->default(0); # 一级
//            $table->(''); # 注释
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
        Schema::dropIfExists('buildings');
    }
}
