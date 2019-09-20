<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->bigIncrements('id');
        
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('warrior_used');
            $table->foreign('warrior_used')->references('id')->on('warriors');

            $table->unsignedBigInteger('warrior_fought');
            $table->foreign('warrior_fought')->references('id')->on('warriors');

            $table->enum('result', ['win', 'loose', 'tie'])->default('win');

            $table->datetime('date');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battles');
    }
}
