<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //COLUNAS
            $table->id();
            $table->unsignedBigInteger('produto_id');  // PARA CHAVE ESTRAGEIRA
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            // CONSTRAINTS

            $table->foreign('produto_id')->references('id')->on('produtos'); // forma que se usa para criar uma relação entre tabelas
            $table->unique('produto_id'); // adicionado quando for RELACIONAMENTO DE 1:1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
