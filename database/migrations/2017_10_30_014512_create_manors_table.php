<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('xAxis'); # World Map
            $table->unsignedSmallInteger('yAxis'); # World Map

            $table->unsignedBigInteger('people')->default(3);
            $table->unsignedSmallInteger('attitude')->default(5000); # max length is: 9999
            $table->float('tax', 3, 2)->default(0.00);

            $table->bigInteger('food')->default(0);
            $table->integer('foodYields')->default(0);

            $table->bigInteger('wood')->default(0);
            $table->integer('woodYields')->default(0);

            $table->bigInteger('stone')->default(0);
            $table->integer('stoneYields')->default(0);

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
