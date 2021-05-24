<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedclothing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usedclothing', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->integer('clothingID');
            $table->date('useDate');
            $table->string('weather',255);
            $table->integer('useRating');
            $table->string('useFeel',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('usedclothing', function (Blueprint $table) {
            //
        });
    }
}