<?php

use Illuminate\Database\Migrations\Migration;

class CreateThrottleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('throttle', function(\Illuminate\Database\Schema\Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('attempts');
            $table->boolean('suspended');
            $table->boolean('banned');
            $table->timestamp('last_attempt_at');
            $table->timestamp('suspended_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('throttle');
    }

}