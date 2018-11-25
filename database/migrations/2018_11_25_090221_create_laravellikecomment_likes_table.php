<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaravellikecommentLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laravellikecomment_likes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('item_id', 191);
			$table->smallInteger('vote');
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
		Schema::drop('laravellikecomment_likes');
	}

}
