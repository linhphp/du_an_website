<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title',500);
            $table->string('slug')->unique();
            $table->text('description',500);
            $table->longtext('content');
            $table->string('post_image');
            $table->integer('kind_of_news_id')->unsigned();
            $table->foreign('kind_of_news_id')
                  ->references('id')
                  ->on('kind_of_news')
                  ->onDelete('cascade'); 
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
        Schema::dropIfExists('news');
    }
}
