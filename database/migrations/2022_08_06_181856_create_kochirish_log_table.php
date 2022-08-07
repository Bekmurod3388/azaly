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
        Schema::create('kochirish_log', function (Blueprint $table) {
            $table->id();
            $table->integer('kochirish_id');
            $table->string('nomi');
            $table->integer('soni');
            $table->integer('bahosi');
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
        Schema::dropIfExists('kochirish_log');
    }
};
