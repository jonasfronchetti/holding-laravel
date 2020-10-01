<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas_cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->integer('estado_id');
            $table->integer('ibge');
            $table->timestamps();

            $table->foreign('estado_id')
                ->references('id')
                ->on('bas_estados')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bas_cidades');
    }
}
