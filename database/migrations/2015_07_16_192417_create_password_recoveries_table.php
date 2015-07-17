<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordRecoveriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('password_recoveries', function(Blueprint $table)
		{
			$table->string('mail');
			$table->string('hash',60);
			$table->timestamps();
			$table->primary(['mail','hash']);
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
		Schema::drop('password_recoveries');
	}

}
