<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 100)->nullable();
			$table->integer('availability_id')->nullable()->index('idx_book_availability_id');
			$table->string('image_dir', 100)->nullable();
			$table->string('created_at', 30)->nullable();
			$table->string('updated_at', 30)->nullable();
			$table->string('isbn', 30)->nullable();
			$table->integer('publisher_id')->unsigned()->nullable()->index('idx_book_publisher_id');
			$table->text('description', 65535)->nullable();
			$table->string('issue_date', 30)->nullable();
			$table->integer('cover')->nullable();
			$table->integer('format_id')->unsigned()->nullable()->index('idx_book_format_id');
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
		Schema::drop('book');
	}

}
