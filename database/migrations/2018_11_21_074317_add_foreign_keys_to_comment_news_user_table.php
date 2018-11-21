<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentNewsUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comment_news_user', function(Blueprint $table)
		{
			$table->foreign('news_id', 'fk_comment_news_user_news')->references('id')->on('news')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('comment_id', 'fk_comment_news_user_news_comments')->references('id')->on('news_comments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_comment_news_user_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comment_news_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_comment_news_user_news');
			$table->dropForeign('fk_comment_news_user_news_comments');
			$table->dropForeign('fk_comment_news_user_users');
		});
	}

}
