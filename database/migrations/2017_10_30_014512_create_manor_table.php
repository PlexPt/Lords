<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('xAxis'); # World Map
            $table->unsignedSmallInteger('yAxis'); # World Map

            $table->unsignedBigInteger('people');
            $table->unsignedSmallInteger('attitude');
            $table->float('tax', 3, 2);

            $table->bigInteger('food');
            $table->integer('foodYields');

            $table->bigInteger('wood');
            $table->integer('woodYields');

            $table->bigInteger('stone');
            $table->integer('stoneYields');

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
        Schema::dropIfExists('manor');
    }
}
