<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->enum('page',['eccopac', 'sanmarco'])->default('sanmarco');
            $table->enum('tipo',['producto', 'blog'])->default('blog');
            $table->string('nombre_es')->nullable();
            $table->string('nombre_en')->nullable();
            $table->string('resumen_es')->nullable();
            $table->string('resumen_en')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('categorias');
    }
}
