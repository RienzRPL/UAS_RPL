<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodeSuratUndanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kode_surat_undangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_surat')->unsigned();
            $table->foreign('id_surat')->references('id')->on('undangan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode_surat_undangan');
    }
}
