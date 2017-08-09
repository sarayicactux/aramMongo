<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('family');
			$table->string('n_code');
			$table->string('tel');
			$table->integer('status')->default(1);
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
        Schema::dropIfExists('drivers');
    }
}
