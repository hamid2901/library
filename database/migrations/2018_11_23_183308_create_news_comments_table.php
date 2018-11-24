<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_comments', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index('idx_comment_news_user_user_id');
			$table->integer('news_id')->index('idx_comment_news_user_news_id');
			$table->increments('id');
			$table->text('content', 65535)->nullable();
			$table->timestamps();
			$table->integer('confirm');
			$table->integer('reply_to')->unsigned()->nullable()->index('idx_news_comments_reply_to');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news_comments');
	}

}
