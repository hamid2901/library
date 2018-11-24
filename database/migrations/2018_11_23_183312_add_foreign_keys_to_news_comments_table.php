<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNewsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('news_comments', function(Blueprint $table)
		{
			$table->foreign('news_id', 'fk_comment_news_user_news')->references('id')->on('news')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_comment_news_user_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('reply_to', 'fk_news_comments_news_comments')->references('id')->on('news_comments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('news_comments', function(Blueprint $table)
		{
			$table->dropForeign('fk_comment_news_user_news');
			$table->dropForeign('fk_comment_news_user_users');
			$table->dropForeign('fk_news_comments_news_comments');
		});
	}

}
