<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
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
            $table->string('ifederal', 20);
            $table->string('iestadual', 20)->nullable();
            $table->string('imunicipal', 20)->nullable();
            $table->string('nomefantasia', 20)->nullable();

            $table->smallInteger('codigoregimetributario')->default(0);
            $table->string('logo', 150)->nullable();
            $table->string('cnae_id', 10)->nullable();
            $table->string('hash', 100)->nullable();
            $table->timestamps();


            $table->foreign('cidade_id')
                ->references('id')
                ->on('bas_cidades')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->foreign('cnae_id')
                ->references('id')
                ->on('fis_cnaes')
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
        Schema::dropIfExists('bas_emitentes');
    }
}
