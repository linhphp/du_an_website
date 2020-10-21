<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCartDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('cart_details', function (Blueprint $table) {
            $table->string('destroy')->nullable();
        });
    }
    public function down()
    {
        Schema::table('cart_details', function (Blueprint $table) {
            $table->dropColumn('destroy');
        });
    }
}
