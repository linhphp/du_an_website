<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewTable extends Migration
{
    
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
}
