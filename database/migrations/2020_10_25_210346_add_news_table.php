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
