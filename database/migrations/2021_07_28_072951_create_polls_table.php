<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->UnSignedBigInteger('itemId');
            $table->timestamp('time');
            $table->string('title');
            $table->integer('descendants');         //:: In the case of stories or polls, the total comment count.
            $table->boolean('dead');                //:: True if the item is dead.
            $table->string('kids');                 //:: The ids of the item's comments, in ranked display order.
            $table->string('by');
            $table->string('parts');                //:: A list of related pollopts, in display order.
            $table->integer('score');               //:: The story's score, or the votes for a pollopt.
            $table->boolean('deleted');             //:: True if the item is deleted.
            $table->timestamps();

            $table->foreign('itemId')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
