<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_author', function(Blueprint $table)
		{
			$table->integer('book_id')->index('idx_author_book_book_id');
			$table->integer('author_id')->index('idx_author_book_author_id');
			$table->primary(['book_id','author_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_author');
	}

}
