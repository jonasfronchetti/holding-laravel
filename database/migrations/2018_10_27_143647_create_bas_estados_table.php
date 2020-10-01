<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas_estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('uf', 2);
            $table->integer('codigo');
            $table->integer('pais_id');
            $table->timestamps();

            $table->foreign('pais_id')
                ->references('id')
                ->on('bas_pais')
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
        Schema::dropIfExists('bas_estados');
    }
}
