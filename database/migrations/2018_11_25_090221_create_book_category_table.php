<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_category', function(Blueprint $table)
		{
			$table->integer('book_id')->index('idx_bood_category_book_id');
			$table->integer('category_id')->index('idx_bood_category_category_id');
			$table->primary(['book_id','category_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_category');
	}

}
