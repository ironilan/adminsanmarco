<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especificacions', function (Blueprint $table) {
            $table->id();
            //$table->enum('page',['eccopac', 'sanmarco'])->default('sanmarco');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->string('etiqueta_es')->nullable();
            $table->string('valor_es')->nullable();

            $table->string('etiqueta_en')->nullable();
            $table->string('valor_en')->nullable();
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
        Schema::dropIfExists('especificacions');
    }
}
