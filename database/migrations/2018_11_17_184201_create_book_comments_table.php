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
			$table->integer('id', true);
			$table->integer('book_id')->index('idx_book_comments_book_id');
			$table->integer('user_id')->unsigned()->index('idx_book_comments_user_id');
			$table->integer('reply_to')->nullable()->index('idx_book_comments_reply_to');
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
		Schema::drop('book_comments');
	}

}
