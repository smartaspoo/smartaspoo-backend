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
        Schema::create('penjualan_children', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_faktur');
            $table->foreign('nomor_faktur')->references('nomor_faktur')->on('penjualan');
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
            $table->bigInteger('kode_diskon');
            $table->foreign('kode_diskon')->references('kode_diskon')->on('diskon');
            $table->integer('harga_jual');
            $table->integer('jumlah_item');
            $table->integer('total_bayar');
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
        Schema::dropIfExists('penjualan_children');
    }
};
