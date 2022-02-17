<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->enum('pagina',['eccopac', 'sanmarco', 'todo'])->default('sanmarco');
            $table->enum('mas_vendido',['no', 'si'])->default('no');
            $table->enum('por_llegar',['no', 'si'])->default('no');
            $table->enum('nuevo',['no', 'si'])->default('no');
            
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->unsignedBigInteger('subcategoria_id');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->unsignedBigInteger('linea_id');
            $table->string('codigo')->nullable();
            $table->string('titulo_es')->nullable();
            $table->string('titulo_en')->nullable();
            $table->string('resumen_es')->nullable();
            $table->string('resumen_en')->nullable();
            $table->string('video_es')->nullable();
            $table->string('video_en')->nullable();
            $table->string('slug')->nullable();
            $table->string('imagen')->nullable();
            $table->string('estrellas')->nullable();
            $table->text('descripcion_es')->nullable();
            $table->text('descripcion_en')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
