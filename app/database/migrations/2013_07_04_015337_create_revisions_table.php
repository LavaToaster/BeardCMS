<?php

use Illuminate\Database\Migrations\Migration;

class CreateRevisionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisions', function(\Illuminate\Database\Schema\Blueprint $table) {
            $table->increments('id');
            $table->text('newdata');
            $table->text('olddata');

            $table->softDeletes();
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
        Schema::drop('revisions');
    }

}