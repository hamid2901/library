<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookCommentUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_comment_user', function(Blueprint $table)
		{
			$table->integer('book_id')->index('idx_book_comment_user_book_id');
			$table->integer('user_id')->unsigned()->index('idx_book_comment_user_user_id');
			$table->integer('comment_id')->index('idx_book_comment_user_comment_id');
			$table->primary(['book_id','user_id','comment_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_comment_user');
	}

}
