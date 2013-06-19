<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(\Illuminate\Database\Schema\Blueprint $table)
        {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('reset_password_hash')->nullable();
            $table->string('activation_hash')->nullable();
            $table->string('persist_hash')->nullable();
            $table->boolean('activated')->default(0);
            $table->text('permissions')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->timestamps();

            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}