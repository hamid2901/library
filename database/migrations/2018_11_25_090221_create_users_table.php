<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 191);
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password', 191);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->string('deleted_at', 30)->default(0);
			$table->string('image_name', 100)->nullable();
			$table->integer('role_id')->unsigned()->index('idx_users_role_id')->default(1);
			$table->integer('status_id')->unsigned()->index('idx_users_status_id')->default(1);
			$table->integer('confirm')->default(0);
			$table->string('first_name', 100)->nullable();
			$table->string('last_name', 100)->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('profession', 100)->nullable();
			$table->string('university', 100)->nullable();
			$table->string('birthdate', 30)->nullable();
			$table->integer('sex')->index('idx_users_sex')->default(1);
			$table->string('city', 100)->nullable();
			$table->string('street', 100)->nullable();
			$table->integer('plate')->nullable();
			$table->string('alley', 100)->nullable();
			$table->string('postal_code', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
