<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaravellikecommentTotalLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laravellikecomment_total_likes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('item_id', 191);
			$table->integer('total_like');
			$table->integer('total_dislike');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laravellikecomment_total_likes');
	}

}
