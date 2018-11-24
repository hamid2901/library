<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_comments', function(Blueprint $table)
		{
			$table->integer('book_id')->index('idx_book_comment_user_book_id');
			$table->integer('user_id')->unsigned()->index('idx_book_comment_user_user_id');
			$table->increments('id');
			$table->integer('confirm')->nullable();
			$table->timestamps();
			$table->text('content', 65535)->nullable();
			$table->integer('reply_to')->unsigned()->nullable()->index('idx_book_comments_reply_to');
			$table->primary(['book_id','user_id','id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_comments');
	}

}
