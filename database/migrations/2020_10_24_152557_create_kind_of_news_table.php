<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKindOfNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kind_of_news', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('new_categories_id')->unsigned();
            $table->foreign('new_categories_id')
                  ->references('id')
                  ->on('news_categories')
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
        Schema::dropIfExists('kind_of_news');
    }
}
