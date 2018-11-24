<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookFactorUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_factor_user', function(Blueprint $table)
		{
			$table->integer('book_id')->index('idx_book_factor_user_book_id');
			$table->integer('factor_id')->index('idx_book_factor_user_factor_id');
			$table->integer('user_id')->unsigned()->index('idx_book_factor_user_user_id');
			$table->primary(['book_id','factor_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_factor_user');
	}

}
