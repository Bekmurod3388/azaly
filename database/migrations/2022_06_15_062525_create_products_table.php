<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->integer('purchase_id');
            $table->string('name');
            $table->string('artikul');
            $table->string('category_id');
            $table->integer('sum_came');
            $table->string('status')->default(0);
            $table->integer('count');
            $table->integer('percent')->nullable();
            $table->integer('sum_sell_optom');
            $table->integer('sum_sell');
            $table->integer('shelf_id');
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
        Schema::dropIfExists('products');
    }
};
