<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('author', function(Blueprint $table)
		{
			$table->foreign('role_id', 'fk_author_author_role')->references('id')->on('author_role')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('author', function(Blueprint $table)
		{
			$table->dropForeign('fk_author_author_role');
		});
	}

}
