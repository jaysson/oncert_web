<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_sessions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->integer('course_id')->unsigned()->index();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->enum('status',array(1,0))->default(1);
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
		Schema::drop('course_sessions');
	}

}
