<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNosotrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nosotros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_es')->nullable();
            $table->text('descripcion_es')->nullable();
            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();
            $table->string('imagen_fondo')->nullable();

            $table->string('icon1')->nullable();
            $table->string('titulo_icon1_es')->nullable();
            $table->string('resumen_icon1_es')->nullable();

            $table->string('icon2')->nullable();
            $table->string('titulo_icon2_es')->nullable();
            $table->string('resumen_icon2_es')->nullable();

            $table->string('icon3')->nullable();
            $table->string('titulo_icon3_es')->nullable();
            $table->string('resumen_icon3_es')->nullable();

            $table->string('titulo_pqe_es')->nullable();
            $table->string('resumen_pqe_es')->nullable();
            $table->string('imagen_pqe_es')->nullable();

            $table->string('titulo_mision_es')->nullable();
            $table->string('resumen_mision_es')->nullable();
            $table->string('imagen_mision_es')->nullable();

            $table->string('titulo_vision_es')->nullable();
            $table->string('resumen_vision_es')->nullable();
            $table->string('imagen_vision_es')->nullable();



            /****************************************************************/
            $table->string('titulo_en')->nullable();
            $table->text('descripcion_en')->nullable();

            
            $table->string('titulo_icon1_en')->nullable();
            $table->string('resumen_icon1_en')->nullable();

            
            $table->string('titulo_icon2_en')->nullable();
            $table->string('resumen_icon2_en')->nullable();

           
            $table->string('titulo_icon3_en')->nullable();
            $table->string('resumen_icon3_en')->nullable();

            $table->string('titulo_pqe_en')->nullable();
            $table->string('resumen_pqe_en')->nullable();
            

            $table->string('titulo_mision_en')->nullable();
            $table->string('resumen_mision_en')->nullable();
           

            $table->string('titulo_vision_en')->nullable();
            $table->string('resumen_vision_en')->nullable();
            

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
        Schema::dropIfExists('nosotros');
    }
}
