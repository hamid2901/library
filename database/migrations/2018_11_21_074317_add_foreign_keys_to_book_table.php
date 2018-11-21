<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book', function(Blueprint $table)
		{
			$table->foreign('availability_id', 'fk_book_book_availability')->references('id')->on('book_availability')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('format_id', 'fk_book_book_format')->references('id')->on('book_format')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('publisher_id', 'fk_book_publishers')->references('id')->on('publishers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book', function(Blueprint $table)
		{
			$table->dropForeign('fk_book_book_availability');
			$table->dropForeign('fk_book_book_format');
			$table->dropForeign('fk_book_publishers');
		});
	}

}
