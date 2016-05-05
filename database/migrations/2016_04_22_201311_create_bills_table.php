<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('republic_id')->unsigned()->index()->nullable();
            $table->foreign('republic_id')->references('id')->on('republics')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('billtype_id')->unsigned()->nullable();
            $table->foreign('billtype_id')->references('id')->on('billtypes');

            $table->string('name');
            $table->decimal('value', 2);
            $table->timestamp('due_date');

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
        Schema::drop('bills');
    }
}
