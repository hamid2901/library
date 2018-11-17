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
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('idx_news_comments_user_id');
			$table->integer('news_id')->index('idx_news_comments_news_id');
			$table->integer('reply_to')->unsigned()->nullable()->index('idx_news_comments_reply_to');
			$table->text('content')->nullable();
			$table->string('create_at', 30)->nullable();
			$table->string('update_at', 30)->nullable();
			$table->integer('confirm')->default(0);
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
