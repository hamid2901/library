<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personal_data', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->unique('_1');
			$table->string('first_name', 100)->nullable();
			$table->string('last_name', 100)->nullable();
			$table->integer('gender_id')->unsigned()->index('idx_personal_data_gender_id');
			$table->string('phone', 11)->nullable();
			$table->string('profession', 100)->nullable();
			$table->string('university', 100)->nullable();
			$table->string('birthday', 30)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personal_data');
	}

}
