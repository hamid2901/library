<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_author', function(Blueprint $table)
		{
			$table->foreign('article_id', 'fk_author_article_article')->references('id')->on('article')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('author_id', 'fk_author_article_author')->references('id')->on('author')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_author', function(Blueprint $table)
		{
			$table->dropForeign('fk_author_article_article');
			$table->dropForeign('fk_author_article_author');
		});
	}

}
