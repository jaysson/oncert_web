<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSnapShotFieldsToQuestionsTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('questions', function(Blueprint $table) {     
            
            $table->string('snap_shot_file_name')->nullable();
            $table->integer('snap_shot_file_size')->nullable();
            $table->string('snap_shot_content_type')->nullable();
            $table->timestamp('snap_shot_updated_at')->nullable();

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function(Blueprint $table) {

            $table->dropColumn('snap_shot_file_name');
            $table->dropColumn('snap_shot_file_size');
            $table->dropColumn('snap_shot_content_type');
            $table->dropColumn('snap_shot_updated_at');

        });
    }

}
