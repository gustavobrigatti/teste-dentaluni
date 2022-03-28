<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistasEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistas_especialidades', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->integer('dentista_id')->unsigned();
            $table->integer('especialidade_id')->unsigned();
            $table->foreign('dentista_id')->references('id')->on('dentistas')->onDelete('cascade');
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
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
        Schema::dropIfExists('dentistas_especialidades');
    }
}
