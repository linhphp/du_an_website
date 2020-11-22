<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->float('import_price', 30, 2);
            $table->float('export_price', 30, 2);
            $table->integer('total_quantity');
            $table->integer('sold_quantity');
            $table->integer('the_remaining_quantity');
            $table->float('actual_revenue',50, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('revenues');
    }
}
