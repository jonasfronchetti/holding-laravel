<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero')->nullable();
            $table->string('descricao', 500);
            $table->integer('fornecedor_id');
            $table->integer('pessoa_id')->nullable();
            $table->integer('tipodespesa_id');
            $table->date('data');
            $table->decimal('valor', 12, 2);

            $table->timestamps();

            $table->foreign('fornecedor_id')
                ->references('id')
                ->on('bas_pessoas')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            $table->foreign('pessoa_id')
                ->references('id')
                ->on('bas_pessoas')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            $table->foreign('tipodespesa_id')
                ->references('id')
                ->on('fin_tipo_despesas')
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
        Schema::dropIfExists('fin_despesas');
    }
}
