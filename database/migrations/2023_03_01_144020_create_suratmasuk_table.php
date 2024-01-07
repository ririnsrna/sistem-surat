<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuks', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->unique('no_surat');
            $table->string('no_surat');
            $table->date('tanggal_surat');
            $table->string('status');
            $table->string('pengirim');
            $table->string('ditujukan');
            $table->string('perihal');
            $table->string('keterangan');
            $table->string('tanggapan');
            $table->string('file');
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
        Schema::dropIfExists('suratmasuk');
    }
}
