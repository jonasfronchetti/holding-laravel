<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinGarantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_garantias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id');
            $table->string('nome', 200);
            $table->decimal('valor', 12, 2);
            $table->decimal('rendimento', 12, 2);
            $table->date('data');
            $table->boolean('ativo')->default(true);
            $table->date('update_rendimento');


            $table->timestamps();

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
        Schema::dropIfExists('fin_garantias');
    }
}
