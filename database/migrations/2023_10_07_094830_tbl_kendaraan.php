<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id_kendaraan');
            $table->string('kode_kendaraan');
            $table->string('nama_kendaraan');
            $table->string('merek_kendaraan');
            $table->double('harga', 15, 8);
            $table->integer('stok');
            $table->text('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kendaraan');
    }
};
