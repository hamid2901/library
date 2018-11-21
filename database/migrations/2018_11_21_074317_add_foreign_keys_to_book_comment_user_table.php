<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookCommentUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_comment_user', function(Blueprint $table)
		{
			$table->foreign('book_id', 'fk_book_comment_user_book')->references('id')->on('book')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('comment_id', 'fk_book_comment_user_book_comments')->references('id')->on('book_comments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_book_comment_user_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_comment_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_book_comment_user_book');
			$table->dropForeign('fk_book_comment_user_book_comments');
			$table->dropForeign('fk_book_comment_user_users');
		});
	}

}
