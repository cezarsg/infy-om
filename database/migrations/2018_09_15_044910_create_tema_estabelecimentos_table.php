<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTemaEstabelecimentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_estabelecimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('descricao', 150);
            $table->numeric('ativo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tema_estabelecimentos');
    }
}
