<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('state', 100)->nullable();
			$table->string('city', 100)->nullable();
			$table->string('street', 100)->nullable();
			$table->string('alley', 100)->nullable();
			$table->string('postal_code', 10)->nullable();
			$table->integer('plate')->nullable();
			$table->integer('user_id')->unsigned()->unique('_3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('address');
	}

}
