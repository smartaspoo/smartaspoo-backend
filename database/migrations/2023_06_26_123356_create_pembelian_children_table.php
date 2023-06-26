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
        Schema::create('pembelian_children', function (Blueprint $table) {
            $table->string('pembelian_children_id')->primary();
            $table->string('pembelian_id');
            $table->foreign('pembelian_id')->references('pembelian_id')->on('pembelian');
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
            $table->integer('harga_beli');
            $table->integer('diskon_harga');
            $table->integer('jumlah');
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
        Schema::dropIfExists('pembelian_children');
    }
};
