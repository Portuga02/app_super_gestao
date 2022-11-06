<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criando a fk e revendo a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criando a fk e revendo a coluna motivo_contato
        Schema::table('sites_contatos', function (Blueprint $table) {
            $table->integer('motivo_contatos');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        DB::statement('update site_contatos set motivo_contato =  motivo_contatos_id');

        //removendo a coluna motivo_contato_id
        Schema::table('sites_contatos', function (Blueprint $table) {

            $table->dropColumn('motivo_contato');
        });
    }
}
