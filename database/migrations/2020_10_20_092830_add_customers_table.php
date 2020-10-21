<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('batch')->default(1);
        });
    }
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('batch');
        });
    }
}
