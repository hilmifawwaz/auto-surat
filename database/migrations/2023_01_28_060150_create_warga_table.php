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
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jk', ['L', 'P']);
            $table->enum('goldar', ['A', 'B', 'AB', 'O']);
            $table->string('alamat');
            $table->string('agama');
            $table->enum('sp', ['Belum Kawin', 'Kawin']);
            $table->string('pekerjaan');
            $table->enum('kwn', ['WNI', 'WNA']);
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
