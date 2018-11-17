<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_details', function(Blueprint $table)
		{
			$table->foreign('book_id', 'fk_book_details_book')->references('id')->on('book')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('format_id', 'fk_book_details_books_format')->references('id')->on('book_format')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('publisher_id', 'fk_book_details_publishers')->references('id')->on('publishers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_details', function(Blueprint $table)
		{
			$table->dropForeign('fk_book_details_book');
			$table->dropForeign('fk_book_details_books_format');
			$table->dropForeign('fk_book_details_publishers');
		});
	}

}
