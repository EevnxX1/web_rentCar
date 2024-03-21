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
        Schema::create('pinjam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_ref');
            $table->string('no_cus');
            $table->string('nm_customer');
            $table->string('kode_kendaraan');
            $table->integer('jumlah_pinjam');
            $table->integer('lama_pinjam');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->double('total');
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
        Schema::dropIfExists('pinjam');
    }
};
