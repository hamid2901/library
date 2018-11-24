<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_author', function(Blueprint $table)
		{
			$table->foreign('author_id', 'fk_author_book_author')->references('id')->on('author')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('book_id', 'fk_author_book_book')->references('id')->on('book')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_author', function(Blueprint $table)
		{
			$table->dropForeign('fk_author_book_author');
			$table->dropForeign('fk_author_book_book');
		});
	}

}
