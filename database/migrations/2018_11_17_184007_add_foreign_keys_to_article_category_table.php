<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_category', function(Blueprint $table)
		{
			$table->foreign('article_id', 'fk_article_category_article')->references('id')->on('article')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('category_id', 'fk_article_category_categories')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_category', function(Blueprint $table)
		{
			$table->dropForeign('fk_article_category_article');
			$table->dropForeign('fk_article_category_categories');
		});
	}

}
