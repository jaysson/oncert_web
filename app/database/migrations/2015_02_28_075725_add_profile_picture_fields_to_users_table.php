<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddProfilePictureFieldsToUsersTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('users', function(Blueprint $table) {     
            
            $table->string('profile_picture_file_name')->nullable();
            $table->integer('profile_picture_file_size')->nullable();
            $table->string('profile_picture_content_type')->nullable();
            $table->timestamp('profile_picture_updated_at')->nullable();

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {

            $table->dropColumn('profile_picture_file_name');
            $table->dropColumn('profile_picture_file_size');
            $table->dropColumn('profile_picture_content_type');
            $table->dropColumn('profile_picture_updated_at');

        });
    }

}
