<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinAportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_aportes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id');
            $table->date('data');
            $table->decimal('valor', 12, 2);
            $table->decimal('rendimento', 12, 2);
            $table->decimal('saldo', 12, 2);
            $table->integer('situacao')->default(0); // 0 - aporte inicial, 1 - renovacao
            $table->integer('aplicacao_id')->nullable();
            $table->boolean('ativo')->default(true);
            $table->date('update_rendimento');


            $table->timestamps();

            $table->foreign('pessoa_id')
                ->references('id')
                ->on('bas_pessoas')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            $table->foreign('aplicacao_id')
                ->references('id')
                ->on('fin_aplicacoes')
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
        Schema::dropIfExists('fin_aportes');
    }
}
