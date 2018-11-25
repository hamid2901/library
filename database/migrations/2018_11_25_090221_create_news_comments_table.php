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
			$table->integer('reply_to')->unsigned()->nullable()->index('idx_news_comments_reply_to');
			$table->text('content', 65535)->nullable();
			$table->string('created_at', 30)->nullable();
			$table->string('updated_at', 30)->nullable();
			$table->integer('confirm')->default(0);
			$table->integer('user_id')->unsigned()->nullable()->index('idx_news_comments_user_id');
			$table->integer('new_id')->nullable()->index('idx_news_comments_new_id');
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
