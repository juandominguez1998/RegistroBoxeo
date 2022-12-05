<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxeadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('boxeadores', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Edad');
            $table->string('Peso');
            $table->string('Categoria');
            $table->string('Estado');
            $table->string('Municipio');
            $table->string('Club');
            $table->string('Foto');
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
        Schema::dropIfExists('boxeadores');
    }
}
