<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookFactorUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_factor_user', function(Blueprint $table)
		{
			$table->foreign('book_id', 'fk_book_factor_user_book')->references('id')->on('book')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('factor_id', 'fk_book_factor_user_factor')->references('id')->on('factor')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'fk_book_factor_user_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_factor_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_book_factor_user_book');
			$table->dropForeign('fk_book_factor_user_factor');
			$table->dropForeign('fk_book_factor_user_users');
		});
	}

}
