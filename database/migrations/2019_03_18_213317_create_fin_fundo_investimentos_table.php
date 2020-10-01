<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinFundoInvestimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_fundo_investimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor', 12, 2);
            $table->date('data');
            $table->integer('investimento_id');
            $table->string('detalhes');
            $table->integer('usuario_id');

            $table->timestamps();

            $table->foreign('investimento_id')
                ->references('id')
                ->on('fin_investimentos')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('fin_fundo_investimentos');
    }
}
