<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factor', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('borrow_status')->nullable();
			$table->integer('quantity')->nullable();
			$table->string('borrow_date', 30)->nullable();
			$table->string('created_at', 30)->nullable();
			$table->string('updated_at', 30)->nullable();
			$table->string('reserve_date', 30)->nullable();
			$table->string('duration', 30)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factor');
	}

}
