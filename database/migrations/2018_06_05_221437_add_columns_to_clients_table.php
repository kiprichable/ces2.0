<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {

            $table->string('city');
            $table->string('state');
            $table->string('additional_family');
            $table->string('additional_names');
            $table->string('age');
            $table->string('veteran');
            $table->string('dd214');
            $table->string('last_night_residence');
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {

            Schema::dropIfExists('clients');

        });
    }
}
