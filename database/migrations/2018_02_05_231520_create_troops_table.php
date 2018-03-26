<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTroopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mapId'); # 领地Id
            $table->string('troopName', 16); # 军队名称
            # 近战兵数量：
            $table->unsignedMediumInteger('meleeOne'); # 一级
            $table->unsignedMediumInteger('meleeTwo'); # 二级
            # 远程兵数量：
            $table->unsignedMediumInteger('remoteOne'); # 一级
            $table->unsignedMediumInteger('remoteTwo'); # 二级
            # 运输兵数量：
            $table->unsignedMediumInteger('carryOne'); # 一级
            $table->unsignedMediumInteger('carryTwo'); # 二级
            # 攻城兵数量：
            $table->unsignedMediumInteger('siegeOne'); # 一级
            $table->bigInteger('foodExpend'); # 粮食消耗
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
        Schema::dropIfExists('troops');
    }
}
