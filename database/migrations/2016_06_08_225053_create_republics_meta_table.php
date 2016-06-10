<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepublicsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics_meta', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('republic_id')->unsigned()->index();
        $table->foreign('republic_id')->references('id')->on('republics')
            ->onUpdate('cascade')->onDelete('cascade');

        $table->string('type')->default('null');

        $table->string('key')->index();
        $table->text('value')->nullable();

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
        Schema::drop('republics_meta');
    }
}
