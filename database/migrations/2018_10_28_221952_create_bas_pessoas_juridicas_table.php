<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasPessoasJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas_pessoas_juridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id');
            $table->string('ifederal', 20);
            $table->string('iestadual', 20)->nullable();
            $table->string('imunicipal', 20)->nullable();
            $table->string('nomefantasia', 20)->nullable();
            $table->timestamps();

            $table->foreign('pessoa_id')
                ->references('id')
                ->on('bas_pessoas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bas_pessoas_juridicas');
    }
}
