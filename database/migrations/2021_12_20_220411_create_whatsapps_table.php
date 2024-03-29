<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapps', function (Blueprint $table) {
            $table->id();
            $table->enum('page',['eccopac', 'sanmarco'])->default('sanmarco');
            $table->string('nombre')->nullable();
            $table->string('area_es')->nullable();
            $table->string('mensaje_es')->nullable();

            $table->string('area_en')->nullable();
            $table->string('mensaje_en')->nullable();

            $table->string('whatsapp')->nullable();
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
        Schema::dropIfExists('whatsapps');
    }
}
