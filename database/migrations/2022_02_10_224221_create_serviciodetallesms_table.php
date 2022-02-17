<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciodetallesmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviciodetallesms', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_es')->nullable();
            $table->string('titulo_en')->nullable();
            $table->string('slug')->nullable();
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('serviciosm_id');
            $table->foreign('serviciosm_id')->references('id')->on('serviciosms')->onDelete('cascade');
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
        Schema::dropIfExists('serviciodetallesms');
    }
}
