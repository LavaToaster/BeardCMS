<?php

use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create("pages" , function(\Illuminate\Database\Schema\Blueprint $table) {
            /* Create the columns */
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText("content");
            $table->string('visibility', 20);
            $table->string('type');
            $table->string('template')->nullable();
            $table->boolean('isDefault')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}