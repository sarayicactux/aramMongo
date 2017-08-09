<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecedentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decedents', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('gender');
			$table->string('name');
			$table->string('family');
			$table->string('f_name');
			$table->string('b_num');
			$table->string('n_code');
			$table->string('b_location');
			$table->string('job');
			$table->string('zipcode');
			$table->string('tel');
			$table->string('mobile');
			$table->string('m_name');
			$table->integer('b_date');
			$table->integer('age');
			$table->string('nationality');
			$table->integer('d_date_status')->default(0);
			$table->integer('d_date');
			$table->integer('int_date');
			$table->string('d_reason');
			$table->integer('death_id')->default(0);
			$table->string('disease');
			$table->string('hos_dc');
			$table->string('sh_series');
			$table->string('sh_serial');
			$table->integer('reg_num')->default(0);
			$table->string('d_place');
			$table->integer('age_type');
			$table->integer('is_sh')->default(0);
			$table->integer('burial')->default(0);
			$table->string('burial_p');
			$table->integer('user_id');
			$table->integer('regdate');
			$table->string('hregdate');
			$table->string('priest')->default('');
			$table->string('fridge_num');
			$table->text('addr');
			$table->text('discription');
			$table->integer('driver')->default(0);
			$table->string('add_txt');
			$table->integer('del_ed')->default(0);
			$table->integer('act_stat')->default(21);
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
        Schema::dropIfExists('decedents');
    }
}
