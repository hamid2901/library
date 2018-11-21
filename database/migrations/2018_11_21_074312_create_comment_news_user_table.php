<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentNewsUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment_news_user', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index('idx_comment_news_user_user_id');
			$table->integer('news_id')->index('idx_comment_news_user_news_id');
			$table->integer('comment_id')->unsigned()->index('idx_comment_news_user_comment_id');
			$table->primary(['user_id','news_id','comment_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comment_news_user');
	}

}
