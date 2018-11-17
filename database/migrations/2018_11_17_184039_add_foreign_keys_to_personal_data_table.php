<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersonalDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('personal_data', function(Blueprint $table)
		{
			$table->foreign('gender_id', 'fk_personal_data_gender')->references('id')->on('gender')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_personal_data_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('personal_data', function(Blueprint $table)
		{
			$table->dropForeign('fk_personal_data_gender');
			$table->dropForeign('fk_personal_data_users');
		});
	}

}
