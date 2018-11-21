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
			$table->foreign('reply_to', 'fk_news_comments_news_comments')->references('id')->on('news_comments')->onUpdate('CASCADE')->onDelete('CASCADE');
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
			$table->dropForeign('fk_news_comments_news_comments');
		});
	}

}
