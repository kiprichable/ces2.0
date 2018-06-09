<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('availability')) {
            Schema::create('availability', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('employee_id')->unsigned()->nullable();
                $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
                $table->datetime('start_time')->nullable();
                $table->datetime('finish_time')->nullable();
                $table->timestamp('booked_at')->nullable();
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availability');
    }
}
