<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarriorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warriors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 8);
            $table->tinyinteger('speed')->default(1);
            $table->tinyinteger('strength')->default(1);
            $table->tinyinteger('skills')->default(1);
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
        Schema::dropIfExists('warriors');
    }
}
