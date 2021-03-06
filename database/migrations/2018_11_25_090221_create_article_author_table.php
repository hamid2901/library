<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_author', function(Blueprint $table)
		{
			$table->integer('article_id')->index('idx_author_article_article_id');
			$table->integer('author_id')->index('idx_author_article_author_id');
			$table->primary(['article_id','author_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_author');
	}

}
