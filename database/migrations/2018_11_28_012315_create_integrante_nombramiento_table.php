<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegranteNombramientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrante_nombramiento', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('integrante_id');
            $table->foreign('integrante_id')
                ->references('id')
                ->on('integrantes')
                ->onDelete('cascade');

            $table->unsignedInteger('nombramiento_id');

            $table->foreign('nombramiento_id')
                ->references('id')
                ->on('nombramientos')
                ->onDelete('cascade');

            $table->string('Comentario');
            $table->unsignedInteger('edad');

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
        Schema::dropIfExists('integrante_nombramiento');
    }
}
