<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasConfiguracaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas_configuracoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id');
            $table->string('parametro', 300);
            $table->text('valor');
            $table->text('descricao');
            $table->timestamps();

            $table->foreign('empresa_id')
                ->references('id')
                ->on('bas_empresas')
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
        Schema::dropIfExists('configuracaos');
    }
}
