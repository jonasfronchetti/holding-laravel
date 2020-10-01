<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinMovimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_movimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor', 12, 2);
            $table->date('data');
            $table->integer('historico_id');
            $table->string('tipo', 1);
            $table->integer('aporte_id')->nullable();
            $table->integer('pessoa_id');

            $table->timestamps();

            $table->foreign('historico_id')
                ->references('id')
                ->on('fin_historicos')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->foreign('aporte_id')
                ->references('id')
                ->on('fin_aportes')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->foreign('pessoa_id')
                ->references('id')
                ->on('bas_pessoas')
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
        Schema::dropIfExists('fin_movimentos');
    }
}
