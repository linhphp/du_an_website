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
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->softDeletes();
        });
    }
}
