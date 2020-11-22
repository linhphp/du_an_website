<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewsTable extends Migration
{
    
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('date');
            $table->string('views')->default(0);
            $table->foreign('kind_of_news_id')->references('id')->on('kind_of_news');
            $table->foreign('news_category_id')->references('id')->on('news_categories');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('views');
            $table->softDeletes();
        });
    }
}
