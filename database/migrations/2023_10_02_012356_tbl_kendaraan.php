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
        Schema::create('tbl_kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_kendaraan');
            $table->string('nama_kendaraan');
            $table->string('merek_kendaraan');
            $table->double('harga', 15, 8);
            $table->integer('stok');
            $table->text('ket');
            $table->text('gambar');
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
        Schema::dropIfExists('tbl_kendaraan');
    }
};
