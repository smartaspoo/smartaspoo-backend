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
            $table->integer('penjualan_children');
            $table->string('nomor_faktur');
            $table->foreign('nomor_faktur')->references("nomor_faktur")->on("penjualan");
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references("kode_barang")->on("barang");
            $table->string('kode_diskon');
            $table->foreign('kode_diskon')->references("nomor_faktur")->on("penjualan");
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
