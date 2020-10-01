<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasPessoasFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas_pessoas_fisicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id');
            $table->string('cpf', 20);
            $table->string('rg', 20)->nullable();
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
        Schema::dropIfExists('bas_pessoas_fisicas');
    }
}
