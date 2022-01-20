<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerinternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bannerinternas', function (Blueprint $table) {
            $table->id();
            $table->enum('page',['eccopac', 'sanmarco'])->default('sanmarco');
            $table->string('titulo_es')->nullable();
            $table->string('titulo_en')->nullable();
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('bannerinternas');
    }
}
