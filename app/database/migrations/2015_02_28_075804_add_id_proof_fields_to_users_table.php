<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIdProofFieldsToUsersTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('users', function(Blueprint $table) {     
            
            $table->string('id_proof_file_name')->nullable();
            $table->integer('id_proof_file_size')->nullable();
            $table->string('id_proof_content_type')->nullable();
            $table->timestamp('id_proof_updated_at')->nullable();

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

            $table->dropColumn('id_proof_file_name');
            $table->dropColumn('id_proof_file_size');
            $table->dropColumn('id_proof_content_type');
            $table->dropColumn('id_proof_updated_at');

        });
    }

}
