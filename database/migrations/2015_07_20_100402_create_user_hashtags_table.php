<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHashtagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_hashtags', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('hashtag_id');
			$table->timestamps();
			$table->primary(['user_id','hashtag_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_hashtags');
	}

}
