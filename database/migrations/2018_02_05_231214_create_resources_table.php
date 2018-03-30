<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     * 其实是资源表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mapId')->unique();
            $table->unsignedInteger('userId');
            $table->mediumInteger('area'); # 面积
            $table->unsignedBigInteger('peopleVoid')->default(10); # 人口闲量
            $table->unsignedBigInteger('areaVoid')->default(0); # 面积闲量

            $table->float('peopleBorn')->default(0); # 人口产出
            $table->mediumInteger('foodBorn')->default(0); # 粮食产出
            $table->mediumInteger('moneyBorn')->default(0); # 金钱产出
            $table->mediumInteger('woodBorn')->default(0); # 木材产出

            $table->unsignedBigInteger('peopleHas')->default(10); # 人口存量
            $table->unsignedBigInteger('foodHas')->default(40); # 粮食存量
            $table->unsignedBigInteger('moneyHas')->default(0); # 金钱存量
            $table->unsignedBigInteger('woodHas')->default(0); # 木材存量

            $table->unsignedBigInteger('peopleDepot')->default(15); # 人口容量
//            $table->unsignedBigInteger('foodDepot')->default(0); # 粮食容量
//            $table->unsignedBigInteger('woodDepot')->default(0); # 木材容量

//            $table->unsignedBigInteger('stoneDepot')->default(0); # 石块容量
//            $table->unsignedBigInteger('ironDepot')->default(0); # 铁矿容量

//            $table->mediumInteger('stoneBorn')->default(0); # 石块产出
//            $table->mediumInteger('ironBorn')->default(0); # 铁矿产出

//            $table->unsignedBigInteger('stoneHas')->default(0); # 石块存量
//            $table->unsignedBigInteger('ironHas')->default(0); # 铁矿存量
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
        Schema::dropIfExists('resources');
    }
}
