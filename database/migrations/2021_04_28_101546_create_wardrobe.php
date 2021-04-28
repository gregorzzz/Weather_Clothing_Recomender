<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardrobe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wardrobe', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('clothingType', 10);
            $table->string('clothingName', 255);
            $table->string('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wardrobe', function (Blueprint $table) {
            //
        });
    }
}
