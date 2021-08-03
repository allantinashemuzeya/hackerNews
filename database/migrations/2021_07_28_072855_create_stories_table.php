<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('itemId');
            $table->string('type');                 //:: The type of item. One of "job", "story", "comment", "poll", or "pollopt".
            $table->string('title'); //:: The title of the story.
            $table->text('text');    //:: The  story or poll text. HTML.
            $table->string('dead');                //:: True if the item is dead.
            $table->longText('kids');                 //:: The ids of the item's comments, in ranked display order.
            $table->mediumText('url');                  //:: The URL of the story.
            $table->timestamp('time');              //:: Creation date of the item, in Unix Time.
            $table->integer('score');               //:: The story's score, or the votes for a pollopt.
            $table->integer('descendants');         //:: In the case of stories or polls, the total comment count.
            $table->string('deleted')->nullable();             //:: True if the item is deleted.

            $table->timestamps();

//            $table->foreign('itemId')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
}
