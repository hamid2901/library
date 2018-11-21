<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_category', function(Blueprint $table)
		{
			$table->foreign('book_id', 'fk_bood_category_book')->references('id')->on('book')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('category_id', 'fk_bood_category_categories')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_category', function(Blueprint $table)
		{
			$table->dropForeign('fk_bood_category_book');
			$table->dropForeign('fk_bood_category_categories');
		});
	}

}
