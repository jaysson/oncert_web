<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertificationUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_certification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certification_id')->unsigned()->index();
            $table->foreign('certification_id')->references('id')->on('certifications')->onDelete('cascade');
            $table->enum('status', ['In Progress', 'Certified']);
            $table->integer('user_id')->unsigned()->index();
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
        Schema::drop('user_certification');
    }

}
