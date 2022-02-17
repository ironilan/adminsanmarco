<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('page',['eccopac', 'sanmarco'])->default('sanmarco');            
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->string('titulo_es')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('fecha_post')->nullable();
            $table->text('resumen_es')->nullable();
            $table->string('imagen')->nullable();

            $table->text('descripcion_es')->nullable();


            $table->string('titulo_en')->nullable();
            $table->text('resumen_en')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
