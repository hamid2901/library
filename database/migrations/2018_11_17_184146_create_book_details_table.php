<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_details', function(Blueprint $table)
		{
			$table->integer('book_id')->unique('_4');
			$table->integer('publisher_id')->unsigned()->nullable()->index('idx_book_details_publisher_id');
			$table->text('description')->nullable();
			$table->string('issue_date', 30)->nullable();
			$table->integer('cover')->nullable();
			$table->integer('format_id')->unsigned()->nullable()->index('idx_book_details_format_id');
			$table->integer('pages')->nullable();
			$table->integer('weight')->nullable();
			$table->integer('price')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_details');
	}

}
