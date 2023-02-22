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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_comunidad')->unsigned();
            $table->string('codigo_nino');
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('pp');
            $table->bigInteger('id_estado')->unsigned();
            $table->string('sexo');
            $table->string('cedula');
            $table->bigInteger('id_tipo_pobreza')->unsigned();
            $table->bigInteger('id_barrio')->unsigned();
            $table->string('fecha_nacimiento');
            $table->string('representantePEM');
            $table->string('contacto_representante');
            $table->bigInteger('id_grado_escolar')->unsigned();
            $table->string('talla_pantalon');
            $table->string('talla_camisa');
            $table->string('talla_zapato');
            $table->string('activo');
            $table->string('nombre_encargado');
            $table->string('telefono_encargado');
            $table->bigInteger('id_centro_educativo')->unsigned();
            $table->string('padrino');
            $table->string('escuela');
            $table->string('beca');
            $table->string('edad');
            $table->timestamps();


            $table->foreign('id_comunidad')->references('id')->on('comunidads');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->foreign('id_tipo_pobreza')->references('id')->on('tipo_pobrezas');
            $table->foreign('id_barrio')->references('id')->on('barrios');
            $table->foreign('id_grado_escolar')->references('id')->on('grados_escolares');
            $table->foreign('id_centro_educativo')->references('id')->on('centro_educativos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
};
