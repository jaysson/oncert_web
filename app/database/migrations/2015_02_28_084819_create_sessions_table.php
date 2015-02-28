<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->integer('certification_id')->unsigned()->index();
            $table->integer('user_id')->unsigned();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->enum('status',array(1,0))->default(1);
            $table->foreign('certification_id')->references('id')->on('certifications')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('sessions');
	}

}
