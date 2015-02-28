<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerAttemptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answer_attempt', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('answer_id')->unsigned()->index();
			$table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
			$table->integer('attempt_id')->unsigned()->index();
			$table->foreign('attempt_id')->references('id')->on('attempts')->onDelete('cascade');
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
		Schema::drop('answer_attempt');
	}

}
