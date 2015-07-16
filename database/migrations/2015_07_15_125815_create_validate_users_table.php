<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('validate_users', function(Blueprint $table)
		{
			$table->string('mail')->unique();
			$table->string('hash',60);
			$table->timestamps();
			$table->primary('mail');
			$table->foreign('mail')->references('mail')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('validate_users');
	}

}
