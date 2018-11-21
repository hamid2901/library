<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_comments', function(Blueprint $table)
		{
			$table->foreign('reply_to', 'fk_book_comments_book_comments')->references('id')->on('book_comments')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_comments', function(Blueprint $table)
		{
			$table->dropForeign('fk_book_comments_book_comments');
		});
	}

}
