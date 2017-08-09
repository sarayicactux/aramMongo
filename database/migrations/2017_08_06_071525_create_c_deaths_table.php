<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCDeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_deaths', function (Blueprint $table) {
            $table->increments('id');
			$table->string('c_death');
			$table->integer('c_code');
			$table->integer('user_id');
			$table->integer('regdate');
			$table->string('hregdate');
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
        Schema::dropIfExists('c_deaths');
    }
}
