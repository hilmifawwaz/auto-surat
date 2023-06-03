<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id('id_warga');
            $table->bigInteger('nik');
            $table->string('nama_lengkap');
            $table->bigInteger('no_kk');
            $table->string('dusun');
            $table->integer('rw');
            $table->integer('rt');
            $table->string('pendidikan');
            $table->string('pendidikan_ditempuh');
            $table->string('pekerjaan');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('kawin');
            $table->string('hub_keluarga');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('status');
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
        Schema::dropIfExists('warga');
    }
};
