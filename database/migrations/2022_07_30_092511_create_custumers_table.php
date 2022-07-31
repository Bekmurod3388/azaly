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
        Schema::create('custumers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('received_goods');
            $table->integer('bonus_money');
            $table->string('phone');
            $table->string('passport');
            $table->integer('discount');
            $table->integer('keashback');
            $table->integer('categorea');
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
        Schema::dropIfExists('custumers');
    }
};
