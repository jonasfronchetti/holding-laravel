<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas_pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->integer('tipopessoa');
            $table->date('dtcadastro')->nullable();
            $table->boolean('ativo')->default(true);
            $table->string('logadouro', 150);
            $table->integer('numero');
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cep', 9)->nullable();
            $table->integer('cidade_id');
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email', 60)->nullable();
            $table->timestamps();

            $table->foreign('cidade_id')
                ->references('id')
                ->on('bas_cidades')
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
        Schema::dropIfExists('bas_pessoas');
    }
}
