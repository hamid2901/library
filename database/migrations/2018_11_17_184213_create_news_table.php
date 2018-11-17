<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 100)->nullable();
			$table->text('content')->nullable();
			$table->text('image_dir')->nullable();
			$table->string('create_at', 30)->nullable();
			$table->string('update_at', 30)->nullable();
			$table->integer('user_id')->unsigned()->index('idx_news_user_id');
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
		Schema::drop('news');
	}

}
